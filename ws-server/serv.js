const WebSocket = require("ws");

let HOST = "localhost";
const WS_PORT = 8888;
let chatUrl = `http://localhost/Web/laragon/temankost/`;

const wsServer = new WebSocket.Server({ host: HOST, port: WS_PORT }, () =>
  console.log(`WS server is listening at ws://${HOST}:${WS_PORT}`)
);

let connectedClients = new Map();
let channels = new Map();
let broadcasts = new Map();

function saveChat(sender, receiver, message, status, timestamp) {
  let data = JSON.stringify({
    sender: sender,
    receiver: receiver,
    message: message,
    status: status,
    timestamp: timestamp,
    id_kost: 1,
  });
  fetch(chatUrl + "chat/insertchat", {
    method: "POST",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
    body: data,
  })
    // .then((response) =>
    //   response.text().then((body) => {
    //     console.log("Success:");
    //   })
    // )
    .catch((error) => {
      console.error("Error:", error);
    });
}

wsServer.on("connection", (ws, req) => {
  const clientIP = req.socket.remoteAddress;
  console.log("New client connected with IP: " + clientIP);
  let cAddr;
  if (req.headers["x-address"]) {
    cAddr = req.headers["x-address"];
    connectedClients.set(cAddr, ws);
    console.log("Client address set to: " + cAddr);
    let brc = null;
    try {
      brc = broadcasts.broadcaster;
    } catch (error) {}
    if (brc && brc.broadcasters.has(cAddr)) {
      console.log(
        `Client ${cAddr} has disconnected, removing channel with ${broadcasts.broadcasters.get(
          cAddr
        )}`
      );
      broadcasts.delete(broadcasts.broadcasters.get(cAddr));
      broadcasts.broadcasters.delete(cAddr);
    }
  }

  ws.on("message", (data) => {
    if (typeof data === "string" && data.startsWith("x-addr:")) {
      cAddr = data.split(":")[1];
      connectedClients.set(cAddr, ws);
      console.log("Client address set to: " + cAddr);
      let brc = null;
      try {
        brc = broadcasts.broadcaster;
      } catch (error) {}
      if (brc && brc.broadcasters.has(cAddr)) {
        console.log(
          `Client ${cAddr} has disconnected, removing channel with ${broadcasts.broadcasters.get(
            cAddr
          )}`
        );
        broadcasts.delete(broadcasts.broadcasters.get(cAddr));
        broadcasts.broadcasters.delete(cAddr);
      }
      return;
    }
    if (typeof data === "string" && data.startsWith("req_addr")) {
      let newAddr = Math.floor(Math.random() * 10).toString();
      ws.send("x-addr:" + newAddr);
      connectedClients.set(newAddr, ws);
      console.log("Client address set to: " + newAddr);
      return;
    }
    if (typeof data === "string" && data.startsWith("get_addr")) {
      ws.send("your-addr:" + cAddr);
      return;
    }

    if (typeof data === "string" && data == "reset_all") {
      channels = new Map();
      broadcasts = new Map();
      console.log("Channels and broadcasts reset");
      return;
    }

    if (!cAddr) {
      console.log("Client address not set, ignoring message.");
      return;
    }

    if (typeof data == "string") {
      console.log(data);
      let [sender, action, message] = data.split("|");
      if (action === "broadcast") {
        if (message === "start") {
          if (broadcasts.size > 0) {
            ws.send("Fail: Another broadcast is active");
            return;
          }
          broadcasts.set(sender, new Set([sender]));
          // Memasukkan semua klien yang tidak berada di channel ke dalam channel broadcast
          for (let [clientAddr, clientWs] of connectedClients) {
            if (!channels.has(clientAddr)) {
              broadcasts.get(sender).add(clientAddr);
              channels.set(clientAddr, { receiver: sender, ws: clientWs });
              console.log(
                `Client ${clientAddr} added to broadcast by ${sender}`
              );
              clientWs.send(`Joined broadcast by ${sender}`);
            }
          }
          channels.set(sender, { receiver: null, ws });
          console.log(`Broadcast started by ${sender}`);
          ws.send("Broadcast started successfully");
        } else if (message === "stop") {
          if (broadcasts.has(sender)) {
            endBroadcast(sender);
            ws.send("Broadcast stopped successfully");
          }
        } else if (message === "join") {
          if (broadcasts.size === 0) {
            ws.send("Fail: No active broadcast to join");
            return;
          }
          for (let [broadcaster, clients] of broadcasts) {
            if (!clients.has(sender)) {
              clients.add(sender);
              channels.set(sender, { receiver: broadcaster, ws });
              console.log(`${sender} joined broadcast by ${broadcaster}`);
              ws.send(`Joined broadcast by ${broadcaster}`);
              break;
            }
          }
        } else if (message === "leave") {
          for (let [broadcaster, clients] of broadcasts) {
            if (clients.has(sender)) {
              clients.delete(sender);
              channels.delete(sender);
              console.log(`${sender} left broadcast by ${broadcaster}`);
              ws.send(`Left broadcast by ${broadcaster}`);
              if (clients.size === 1) {
                endBroadcast(broadcaster);
              }
              break;
            }
          }
        }
      } else if (action === "connect") {
        let receiver = message;
        if (broadcasts.size > 0) {
          ws.send("Fail: Broadcast is active, cannot create a private channel");
          return;
        }
        if (channels.has(sender) || channels.has(receiver)) {
          console.log(
            `Channel already established between ${sender} and ${receiver}`
          );
          try {
            connectedClients.get(sender).send(`connect_not_ok`);
          } catch (error) {
            console.log(error);
          }
          return;
        }
        if (!channels.has(sender) && !channels.has(receiver)) {
          if (!connectedClients.has(receiver)) {
            try {
              connectedClients.get(sender).send(`Fail: receiver not found`);
              try {
                connectedClients.get(sender).send(`connect_not_ok`);
              } catch (error) {
                console.log(error);
              }
            } catch (error) {
              console.log(`No such receiver: ${receiver}`);
            }
            return;
          }
          channels.set(sender, { receiver, ws });
          channels.set(receiver, {
            receiver: sender,
            ws: connectedClients.get(receiver),
          });
          console.log(`Channel established between ${sender} and ${receiver}`);
          try {
            connectedClients.get(sender).send(`connect_ok`);
            console.log("connect_ok");
          } catch (error) {
            console.log(error);
          }
          try {
            connectedClients.get(receiver).send(`connect_ok`);
            console.log("connect_ok");
          } catch (error) {
            console.log(error);
          }
        }
      } else if (action === "stop") {
        let receiver = message;
        if (channels.has(sender) && channels.has(receiver)) {
          try {
            connectedClients.get(sender).send(data);
            connectedClients.get(receiver).send(data);
            console.log(data);
          } catch (error) {
            console.log(`No such receiver: ${receiver}`);
          }
          channels.delete(sender);
          channels.delete(receiver);
          console.log(
            `Channel between ${sender} and ${receiver} has been closed`
          );
        }
      }
    }

    let channel = channels.get(cAddr);
    if (channel && channel.receiver && connectedClients.get(channel.receiver)) {
      if (data instanceof Buffer) {
        // Mengirim data dalam bentuk array buffer hanya kepada receiver di channel yang sama
        connectedClients.get(channel.receiver).send(data);
      } else if (typeof data === "string") {
        // Mengirim data teks hanya kepada receiver di channel yang sama
        connectedClients.get(channel.receiver).send(data);
        let receiver = channel.receiver;
        let sender = cAddr;
        let timestamp = new Date()
          .toISOString()
          .replace(/T/, " ")
          .replace(/\..+/, "");
        saveChat(sender, receiver, data, 1, timestamp);
      }
    } else {
      // Untuk broadcast, hanya broadcaster yang bisa mengirim pesan
      for (let [broadcaster, clients] of broadcasts) {
        if (broadcaster === cAddr) {
          for (let client of clients) {
            if (client !== broadcaster && connectedClients.get(client)) {
              // Mengirim data teks ke semua klien yang ada di channel
              // console.log(data.length);
              connectedClients.get(client).send(data);
            }
          }
        }
      }
    }
  });

  ws.on("close", () => {
    if (!cAddr) {
      console.log(
        "Client with IP: " + clientIP + " disconnected without setting address."
      );
      return;
    }

    console.log("Client with address: " + cAddr + " has disconnected");
    connectedClients.delete(cAddr);

    if (channels.has(cAddr)) {
      let channel = channels.get(cAddr);
      let receiver = channel.receiver;
      if (receiver && channels.has(receiver)) {
        channels.delete(receiver);
        console.log(
          `Client ${cAddr} has disconnected, removing channel with ${receiver}`
        );
      }
      channels.delete(cAddr);
    }

    if (broadcasts.has(cAddr)) {
      endBroadcast(cAddr);
    }

    for (let [broadcaster, clients] of broadcasts) {
      if (clients.has(cAddr)) {
        clients.delete(cAddr);
        channels.delete(cAddr);
        if (clients.size === 1) {
          // only broadcaster remains
          endBroadcast(broadcaster);
        }
        break;
      }
    }
  });

  const endBroadcast = (broadcaster) => {
    if (broadcasts.has(broadcaster)) {
      const clients = broadcasts.get(broadcaster);
      clients.forEach((client) => {
        if (connectedClients.has(client)) {
          try {
            connectedClients
              .get(client)
              .send(`Broadcast ended by ${broadcaster}`);
          } catch (error) {
            console.log(error);
          }
        }
        channels.delete(client);
      });
      broadcasts.delete(broadcaster);
      console.log(`Broadcast by ${broadcaster} has ended`);
    }
  };
});
