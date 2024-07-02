const WebSocket = require("ws");
const fetch = require("node-fetch");

const HOST = "localhost";
const WS_PORT = 8888;
const chatUrl = `http://localhost/Web/laragon/temankost/`;

const clients = new Map();
let wsServer = new WebSocket.Server({ host: HOST, port: WS_PORT });
wsServer.on("connection", (ws, req) => {
  const clientIP = req.socket.remoteAddress;
  console.log(`New client connected with IP: ${clientIP}`);

  ws.on("message", (data) => {
    console.log(data);
    let chatData;
    try {
      let json = JSON.parse(data)[0];
      chatData = {
        sender: json.sender,
        receiver: json.receiver,
        message: json.message,
        status: 0,
        timestamp: json.timestamp,
        id_kost: json.id_kost || 0,
      };
      if (json.command === "handshake" && json.address) {
        clients.set(json.address, ws);
        console.log(`Client ${json.address} connected`);
        ws.send(JSON.stringify({ status: "connected" }));
      } else if (json.receiver) {
        const receiver = clients.get(json.receiver);
        if (!receiver || receiver.readyState !== WebSocket.OPEN) {
          ws.send('{"status":"error","message":"receiver not found"}');
          saveChat(chatData);
        } else {
          receiver.send(data);
          chatData = chatData.status = 1;
          saveChat(chatData);
        }
      } else {
        clients.forEach((client) => {
          if (client !== ws && client.readyState === WebSocket.OPEN) {
            client.send(data);
          }
        });
      }
    } catch (error) {
      console.log(error);
    }
  });

  ws.on("close", () => {
    clients.forEach((client, address) => {
      if (client === ws) {
        clients.delete(address);
        console.log(`Client ${address} disconnected`);
      }
    });
  });
});

function saveChat(data) {
  console.log(data);
  const url = new URL(chatUrl + "chat/insertchat");
  Object.entries(data).forEach(([key, value]) =>
    url.searchParams.append(key, value)
  );
  console.log(url);
  fetch(url, {
    method: "GET",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
  })
    .then((response) => {
      if (response.ok) {
        return response.json();
      } else {
        throw new Error(response.status + " " + response.statusText);
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}
