document.getElementById('startButton1').addEventListener('click', async () => {
    const video = document.getElementById('videoCapture1');

    try {
        // Solicitar acceso a la cámara
        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        video.srcObject = stream;
        video.style.display = 'block'; // Mostrar el elemento de video
    } catch (err) {
        console.error('Error al acceder a la cámara: ', err);
    }
});


function detectarEnter(event) {
    if (event.key === "Enter") {
        verificarMatricula();
    }
}

async function getUserByRegistrationId(registrationId = ''){
    try{

        const data = await fetch(`http://127.0.0.1:8000/api/user/${registrationId}`)
        const dataParse = await data.json();
        return dataParse;

    }catch(error){

        console.log(error)

    }
}

function verificarMatricula() {
    const matricula = document.getElementById('username').value;

    if(!matricula){
        return alert('Ingresa tu matricula')
    }

    getUserByRegistrationId( matricula )
        .then( data => {

            if (data.data.length > 0) {
                // Mostrar el modal del video
                const modalVideo = new bootstrap.Modal(document.getElementById('video'));
                modalVideo.show();
            } else {
                // Mostrar el modal de registro de alumno
                const modalRegistro = new bootstrap.Modal(document.getElementById('registroalumno'));
                modalRegistro.show();
            }


        })
        .catch( console.log )


  
}


// FUNCION DEL VIDEO
document.addEventListener('DOMContentLoaded', () => {
    const videoElement1 = document.getElementById('videoCapture1');
    const startButton1 = document.getElementById('startButton1');
    const stopButton1 = document.getElementById('stopButton1');

    let photosArray = [];
    let stream;
    let intervalId;

    startButton1.addEventListener('click', async () => {
        // Limpiar el array de fotos al iniciar una nueva captura
        photosArray = [];

        stream = await navigator.mediaDevices.getUserMedia({
            video: true
        });
        videoElement1.srcObject = stream;

        // Habilitar el botón de detener y deshabilitar el de iniciar
        startButton1.disabled = true;
        stopButton1.disabled = false;

        // Capturar una foto por segundo hasta que se presione el botón de detener
        intervalId = setInterval(() => {
            capturePhoto();
        }, 1000); // 1 foto cada 1000 ms (1 segundo)
    });

    stopButton1.addEventListener('click', () => {
        // Detener el intervalo de captura
        clearInterval(intervalId);
        stopStream();

        // Habilitar el botón de iniciar y deshabilitar el de detener
        startButton1.disabled = false;
        stopButton1.disabled = true;

        // Mostrar las fotos almacenadas en base64 (sin el prefijo) en la consola
        console.log(photosArray);
    });

    function capturePhoto() {
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');

        // Establecer las dimensiones del canvas al tamaño del video
        canvas.width = videoElement1.videoWidth;
        canvas.height = videoElement1.videoHeight;

        // Dibujar el frame del video en el canvas
        context.drawImage(videoElement1, 0, 0, canvas.width, canvas.height);

        // Obtener la imagen en base64 y eliminar el prefijo "data:image/png;base64,"
        const base64Image = canvas.toDataURL('image/png').replace("data:image/png;base64,", "");

        // Guardar la imagen base64 (sin el prefijo) en el array
        photosArray.push(base64Image);
    }

    function stopStream() {
        // Detener la cámara
        videoElement1.srcObject.getTracks().forEach(track => track.stop());
    }
});
