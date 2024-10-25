<!-- Modal -->
<div class="modal fade" id="registroalumno" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header estilomodal">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Registro Alumno</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">

                    <fieldset>
                        <legend>



                            <div class="form-header">
                                <h4 class="form-title" style="text-align: left;
                                border-radius: 10px;
                                background-color: rgb(97, 162, 184);
                                color: aliceblue;
                                margin-top:c15px;
                                font-size: 15px;
                                text-align: center;">Datos Alumno</h4>
                            </div>

                            <div class="row">


                                <div class="col-md-3">
                                    <strong style="font-size: 12px;">Nombre del Alumno</strong>
                                    <input id="name_Estudent" name="name_Estudent" type="text" class="control form-control"
                                        value="" style="font-size: 12px;">
                                </div>


                                <div class="col-md-3">
                                    <strong style="font-size: 12px;">Matricula</strong>
                                    <input id="student_enrollment" name="student_enrollment" type="number" class="control form-control" value=""
                                        style="font-size: 12px;">
                                </div>


                                <div class="col-md-3">
                                    <strong style="font-size: 12px;">Semestre</strong>
                                    <select name="Semestre" id="Semestre" class="form-select" style="font-size: 12px;">
                                        <option value="">Seleccione</option>
                             
                                    </select>
                                </div>


                                <div class="col-md-3">
                                    <strong style="font-size: 12px;">Carrera</strong>
                                    <select name="carrera" id="carrera" class="form-select" style="font-size: 12px;">
                                        <option value="">Seleccione</option>
                                
                                    </select>
                                </div>
                        </legend>
                    </fieldset>

                    <div class="container">

                        <fieldset>
                            <legend>
                                <div class="form-header">
                                    <h4 class="form-title" style="text-align: left; border-radius: 10px;
                                 background-color: rgb(97, 162, 184); color: aliceblue;
                                  font-size: 15px; text-align: center;">Capturar Fotos</h4>
                                </div>

                                <!-- Captura de fotos -->

                                <video id="videoCapture1" class="unique-video" style="display:none;" autoplay muted></video>
                                <button id="startButton1" class="unique-button">Iniciar Captura</button>
                                <button id="stopButton1" class="unique-button" disabled>Detener Captura</button>

                            </legend>
                        </fieldset>

                    </div>
                </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="saveStudent" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>


<script>

    const getCareers = async () => {
        try{

            const data = await fetch('http://127.0.0.1:8000/api/career');
            const dataParse = await data.json()
            
            return dataParse.data;

        }catch(error){
            console.log(error)

        }
    }
    
    const getSemesters = async () => {
        try{

            const data = await fetch('http://127.0.0.1:8000/api/semester');
            const dataParse = await data.json()
            
            return dataParse.data;

        }catch(error){
            console.log(error)

        }
    }





    const selectCareer = document.getElementById('carrera');
    const selectSemester = document.getElementById('Semestre');
    let careers = [];
    let semesters = [];


    getSemesters()
        .then( data => {
            semesters = data
     
            semesters.forEach(semester  => {
                let newOption = document.createElement('option');

                newOption.value = semester.id_semester;  
                newOption.textContent = semester.semester;  
                selectSemester.appendChild(newOption);  
            });
        })
        .catch(console.log)


    
    getCareers()
        .then( data => {
            careers = data
     
            careers.forEach(career  => {
                let newOption = document.createElement('option');

                newOption.value = career.id_career;  
                newOption.textContent = career.career;  
                selectCareer.appendChild(newOption);  
            });
        })
        .catch(console.log)


        const btnSaveStudent = document.getElementById('saveStudent');

        btnSaveStudent.addEventListener('click', async () => {
            
            const name_student = document.getElementById('name_Estudent').value;
            const student_enrollment = document.getElementById('student_enrollment').value;
            const idCareer = document.getElementById('carrera').value;
            const idSemester = document.getElementById('Semestre').value;

            if(idCareer === ''){
                return alert('Porfavor seleccione la carrera en curso')
            }

            if(idSemester === ''){
                return alert('Porfavor seleccione el semestre en curso')
            }

            const data = {
                name_student,
                registration_student: student_enrollment,
                semester_id: idSemester,
                career_id: idCareer
            }
            

            try{

                const dataStudent = await fetch('http://127.0.0.1:8000/api/user/register/create/', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const student = await dataStudent.json()
                console.log(student)

            }catch(error){

                console.log(error)

            }

        })


</script>