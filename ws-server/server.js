const WebSocket = require("ws");
const fetch = require("node-fetch");

const HOST = "localhost";
const WS_PORT = 8888;
const chatUrl = `http://localhost/Web/laragon/temankost/`;

const wsServer = new WebSocket.Server({ host: HOST, port: WS_PORT }, () =>
  console.log(`WS server is listening at ws://${HOST}:${WS_PORT}`)
);

const clients = new Set();
wsServer.on("connection", (ws, req) => {
  const clientIP = req.socket.remoteAddress;
  console.log(`New client connected with IP: ${clientIP}`);
  clients.add(ws);
  ws.on("message", (data) => {
    clients.forEach((client) => {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(data);
        let json = JSON.parse(data)[0];
        saveChat(
          json.sender,
          json.receiver,
          json.message,
          json.status,
          json.timestamp,
          json.id_kost
        );
      }
    });
  });

  ws.on("close", () => {
    clients.delete(ws);
    console.log(`Client with IP: ${clientIP} has disconnected`);
  });
});

function saveChat(sender, receiver, message, status, timestamp, id_kost) {
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
  }).catch((error) => {
    console.error("Error:", error);
  });
}
