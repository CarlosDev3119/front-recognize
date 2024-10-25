document.getElementById('startButton').addEventListener('click', async () => {
    const video = document.getElementById('videoCapture');

    try {
        // Solicitar acceso a la cámara
        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        video.srcObject = stream;
        video.style.display = 'block'; // Mostrar el elemento de video
    } catch (err) {
        console.error('Error al acceder a la cámara: ', err);
    }
});


// FUNCION DEL VIDEO
document.addEventListener('DOMContentLoaded', () => {
    const videoElement = document.getElementById('videoCapture');
    const startButton = document.getElementById('startButton');
    const stopButton = document.getElementById('stopButton');

    let photosArray = [];
    let stream;
    let intervalId;

    startButton.addEventListener('click', async () => {
        // Limpiar el array de fotos al iniciar una nueva captura
        photosArray = [];

        stream = await navigator.mediaDevices.getUserMedia({
            video: true
        });
        videoElement.srcObject = stream;

        // Habilitar el botón de detener y deshabilitar el de iniciar
        startButton.disabled = true;
        stopButton.disabled = false;

        // Capturar una foto por segundo hasta que se presione el botón de detener
        intervalId = setInterval(() => {
            capturePhoto();
        }, 1000); // 1 foto cada 1000 ms (1 segundo)
    });

    stopButton.addEventListener('click', () => {
        // Detener el intervalo de captura
        clearInterval(intervalId);
        stopStream();

        // Habilitar el botón de iniciar y deshabilitar el de detener
        startButton.disabled = false;
        stopButton.disabled = true;

        // Mostrar las fotos almacenadas en base64 (sin el prefijo) en la consola
        console.log(photosArray);
    });

    function capturePhoto() {
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');

        // Establecer las dimensiones del canvas al tamaño del video
        canvas.width = videoElement.videoWidth;
        canvas.height = videoElement.videoHeight;

        // Dibujar el frame del video en el canvas
        context.drawImage(videoElement, 0, 0, canvas.width, canvas.height);

        // Obtener la imagen en base64 y eliminar el prefijo "data:image/png;base64,"
        const base64Image = canvas.toDataURL('image/png').replace("data:image/png;base64,", "");

        // Guardar la imagen base64 (sin el prefijo) en el array
        photosArray.push(base64Image);
    }

    function stopStream() {
        // Detener la cámara
        videoElement.srcObject.getTracks().forEach(track => track.stop());
    }
});