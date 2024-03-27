// Crea un elemento de video
const video = document.createElement("video");

// Obtiene el contexto del canvas
const canvasElement = document.getElementById("qr-canvas");
const canvas = canvasElement.getContext("2d");

// Variable para controlar si se está escaneando
let scanning = true;

// Función para encender la cámara
const encenderCamara = () => {
  navigator.mediaDevices
    .getUserMedia({ video: { facingMode: "environment" } })
    .then(function (stream) {
      scanning = true;
      btnScanQR.hidden = true;
      canvasElement.hidden = false;
      video.setAttribute("playsinline", true); // Requerido para iOS Safari
      video.srcObject = stream;
      video.play();
      tick();
      scan();
    })
    .catch(function (error) {
      console.error("Error al acceder a la cámara:", error);
    });
};

// Funciones para dibujar en el canvas y escanear
function tick() {
  canvasElement.height = video.videoHeight;
  canvasElement.width = video.videoWidth;
  canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);

  scanning && requestAnimationFrame(tick);
}

function scan() {
  try {
    qrcode.decode();
  } catch (e) {
    setTimeout(scan, 300);
  }
}

// Apaga la cámara
const cerrarCamara = () => {
  video.srcObject.getTracks().forEach((track) => {
    track.stop();
  });
  canvasElement.hidden = true;
  btnScanQR.hidden = false;
};

// Callback cuando se lee un código QR
qrcode.callback = (respuesta) => {
  if (respuesta) {
    // Aquí puedes manejar la respuesta del código QR
    console.log("Código QR detectado:", respuesta);
    activarSonido();
    cerrarCamara();
  }
};

// Evento para encender la cámara al cargar la página
window.addEventListener("load", (e) => {
  encenderCamara();
});
