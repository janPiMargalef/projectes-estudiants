@extends('layouts.app')
@section('content')

@if(session('success'))
    <div>HOLAAAAAAA</div>
@elseif(session('error'))
    <div>HOLAAAAAAAA ERROR</div>
@endif
<body>


    <div class="wrapper">
        <div class="profile-section">
            <!-- Apartat de la foto de perfil i nom d'usuari -->
            <div class="profile-info">
            <img src="/images/profile-images/default-image.jpg" alt="Foto de perfil" id="profileImage" class="clickable">
            <input type="file" id="imageInput" name="image" accept="image/*" style="display: none;">
                <h6 class="user-name"></h6>
                <h6 class="user-occupation"></h6>
                <h6 class="user-name">Energianaccion</h6>
            </div>
            <!-- Apartat dels projectes de l'usuari -->
            <div class="user-projects">
                <h6>MIS PROYECTOS</h6>
            <div class="yours-projects-section" id="myProjectsSection">
                <h6 class="title-style"></h6>
 
            <div id="userProjectLogos"></div> <!-- Proyectos del usuario dinámicamente -->
            </div>
            <div class="joined-projects-section" id="joinedProjectsSection">
                <h6 class="title-style">Unido(2)</h6>
                <img src="/projectes/proj3.jpg" alt="Proyecto 3" class="image-project"><img src="/projectes/proj4.jpg" alt="Proyecto 4" class="image-project">
            </div>


                <div class="button-container">
                    <button class="buttonProjects">Todos</button>
                    <button class="buttonProjects" onclick="openForm()">Añadir</button>
                    <button class="buttonProjects">Unirse</button>
                </div>
                
            </div>
        </div>
<div class="main-section">
            <!-- Apartat dels projectes guardats, matches, likes, etc. -->
    <div class="saved-projects">
        <h6 class="main-title">COINCIDES | GUARDADOS | ME GUSTA</h6>
        <button class="pagination-button-left" id="prevPageSaved"><</button> <!-- Botón de página anterior -->
            <img src="/projectes/menu-contextual.png" alt="Icono ......" class="menu-contextual">
        <button class="pagination-button-right" id="nextPageSaved">></button> 
    <div class="project-grid">
        <!-- Aquí es pot afegir la lògica per mostrar els projectes -->

    </div>
   
</div>
 
    <!-- Apartat principal amb les tarjetes dels projectes -->
    <div class="project-cards">
        <div class="buttonContainerMain">
                    <button class="buttonMain-selected">Proyectos</button>
                    <button class="buttonMain">Mentores</button>
                    <button class="buttonMain">Estudiantes</button>
                    <button class="buttonMain">Todos</button>
                    <img src="/icons/filter-icon.png" alt="Filter icon" class="filter-icon">
        </div>

        <div class="cardContainer">
            <!-- Tarjetas de proyectos se cargarán aquí -->
        </div>
        <div class="projectDetailsContainer">

        </div>
        <div class="mentorContainer">

        </div>
        <div class="mentorDetailsContainer">

        </div>
        <div id="createdProjects" class="created-projects-container">
   
        </div>

            <button class="show-more-button" id="showMore">Mostrar más</button>
        </div>
        
            
        </div>
        <div class="sidebar-section">
            <!-- Apartat dels anuncis -->
            <div class="ads">
                <img src="/icons/ad-icon.png" alt="ad icon" class="ad-icon">
                <h6>Pack & Go.</h6>
                <h4 class="ad-text">We are a custom packaging solution provider.</h4>
                <h6 class="ad-more">Click & more</h6>
                <!-- Aquí es pot afegir la lògica per mostrar els anuncis i events -->
            </div>
                <!-- Apartat dels events -->
                <div class="events">
    <h6 class="events-title">PRÓXIMOS EVENTOS</h6>
    <div class="tarjetas-container">
        <div class="tarjeta">
            <img src="/projectes/proj2.jpg" alt="Foto del evento">
            <div class="informacion">
                <h6>EVENT NAME</h6>
                <p>06/08/24 - Lleida</p>
            </div>
        </div>
        <div class="tarjeta">
            <img src="/projectes/proj5.jpg" alt="Foto del evento">
            <div class="informacion">
                <h6>EVENT NAME</h6>
                <p>06/08/24 - Lleida</p>
            </div>
        </div>
        <div class="tarjeta">
            <img src="/projectes/proj10.jpg" alt="Foto del evento">
            <div class="informacion">
                <h6>EVENT NAME</h6>
                <p>06/08/24 - Lleida</p>
            </div>
        </div>
    </div>
</div>

            <!-- Apartat del petit chat desplegable -->
            <div class="chat-section">
                <h6 class="chats-title">Chat</h6>
                <!-- Aquí es pot afegir la lògica per mostrar el chat -->
            </div>
        
        </div>
    </div>
    <div id="myForm" class="overlay">
    <div class="form-container">
        <h2>Crear Proyecto</h2>
        <form id="projectForm">
            <label for="title">Título de Proyecto:</label><br>
            <input type="text" id="title" name="title"><br>
            <label for="logo">Logo:</label><br>
            <input type="text" id="logo" name="logo"><br>
            <label for="company">Compañía:</label><br>
            <input type="text" id="company" name="company"><br>
            <label for="sector">Sector:</label><br>
            <input type="text" id="sector" name="sector"><br>
            <label for="description">Descripción:</label><br>
            <input type="text" id="description" name="description"><br>
            <label for="budget">Nivel de estudios:</label><br>
            <input type="text" id="budget" name="budget"><br><br>


            <button type="submit">Crear</button>
            <button type="button" onclick="closeForm()">Cerrar</button>
        </form>
        <div id="formErrors" style="color: red;"></div>
    </div>
</div>

<!-- Modal de confirmación -->
<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <p>Estas seguro de deshacer esta acción?</p>
        <button id="confirmButton">Sí</button>
        <button id="cancelButton">Cancelar</button>
    </div>
</div>

<!-- Formulario emergente para enviar invitación -->
<div id="invitationModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Invitar a un Usuario</h2>
        <form id="invitationForm" action="{{ route('send.invitation') }}" method="POST">
    @csrf
    <input type="email" id="inviteeEmail" name="inviteeEmail" placeholder="Correo electrónico" required>
    <input type="hidden" id="projectId" name="projectId">
    <button type="submit">Enviar Invitación</button>
</form>

    </div>
</div>


<footer class="footer">
    <div class="footer-section">
        <h3>Compañía</h3>
        <ul>
            <li><a href="#">Acerca de nosotros</a></li>
            <li><a href="#">Nuestro equipo</a></li>
            <li><a href="#">Contacto</a></li>
        </ul>
    </div>
    <div class="footer-section">
        <h3>Plataforma</h3>
        <ul>
            <li><a href="#">Características</a></li>
            <li><a href="#">Planes y precios</a></li>
            <li><a href="#">Demostración</a></li>
        </ul>
    </div>
    <div class="footer-section">
        <h3>Recursos</h3>
        <ul>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Documentación</a></li>
            <li><a href="#">Descargas</a></li>
        </ul>
    </div>
    <div class="footer-section">
        <h3>Soporte</h3>
        <ul>
            <li><a href="#">Centro de ayuda</a></li>
            <li><a href="#">Preguntas frecuentes</a></li>
            <li><a href="#">Soporte técnico</a></li>
        </ul>
    </div>
</footer>

<!--<textarea id="editor"></textarea> -->

</body>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>



<script>
    

// Script para ocultar el toast después de unos segundos


//CKEDITOR.replace('editor');
let currentSection = 'projects'; // Valores posibles: 'projects', 'mentors', 'students', etc.

document.querySelector('.buttonContainerMain').addEventListener('click', function(event) {
    const target = event.target; // El botón en el que se hizo clic
    
    // Asegúrate de que se haya hecho clic en un botón con clase buttonMain o buttonMain-selected
    if (target.classList.contains('buttonMain') || target.classList.contains('buttonMain-selected')) {
        // Remover la clase seleccionada de todos los botones y asegurar que tengan buttonMain
        document.querySelectorAll('.buttonMain, .buttonMain-selected').forEach(btn => {
            btn.classList.remove('buttonMain-selected');
            btn.classList.add('buttonMain');
        });

        // Aplicar la clase seleccionada al botón clickeado y asegurar que se remueva buttonMain
        target.classList.remove('buttonMain');
        target.classList.add('buttonMain-selected');
        const createdProjects = document.querySelector('.created-projects-container');
        const mentorContainer = document.querySelector('.mentorContainer');
        const cardContainer = document.querySelector('.cardContainer');
        const mentorDetailsContainer = document.querySelector('.mentorDetailsContainer');
        const projectDetailsContainer = document.querySelector('.projectDetailsContainer'); 
        const showMoreButton = document.getElementById('showMore');

                // Determinar cuál botón fue clickeado y llamar a la función correspondiente
                switch (target.textContent) {
            case 'Proyectos':
                
                document.getElementById('joinedProjectsSection').style.backgroundColor = ''; // Eliminar el color de fondo
                document.getElementById('joinedProjectsSection').style.boxShadow = ''; // Eliminar la sombra
                document.getElementById('myProjectsSection').style.backgroundColor = ''; // Eliminar el color de fondo
                document.getElementById('myProjectsSection').style.boxShadow = '';
                createdProjects.innerHTML = ''; 
                createdProjects.style.display = 'none';
                cardContainer.innerHTML = ''; 
                mentorContainer.innerHTML = ''; 
                mentorContainer.style.display = 'none';
                projectDetailsContainer.innerHTML = ''; 
                projectDetailsContainer.style.display = 'none';
                mentorDetailsContainer.innerHTML = ''; 
                mentorDetailsContainer.style.display = 'none';

                cardContainer.style.display = 'flex';
                showMoreButton.style.display = 'block';
                currentSection = 'projects';
                
                fetchProjects(true);
                break;
            case 'Mentores':

                document.getElementById('joinedProjectsSection').style.backgroundColor = ''; // Eliminar el color de fondo
                document.getElementById('joinedProjectsSection').style.boxShadow = ''; // Eliminar la sombra
                document.getElementById('myProjectsSection').style.backgroundColor = ''; // Eliminar el color de fondo
                document.getElementById('myProjectsSection').style.boxShadow = '';
                createdProjects.innerHTML = ''; 
                createdProjects.style.display = 'none';
                mentorContainer.innerHTML = ''; 
                cardContainer.innerHTML = ''; 
                cardContainer.style.display = 'none';
                projectDetailsContainer.innerHTML = ''; 
                projectDetailsContainer.style.display = 'none';
                mentorDetailsContainer.innerHTML = ''; 
                mentorDetailsContainer.style.display = 'none';

                mentorContainer.style.display = 'flex';
                showMoreButton.style.display = 'block';

                currentSection = 'mentors';

                fetchMentors();
                break;
            case 'Estudiantes':
                //fetchStudents();
                currentSection = 'students';
                break;
            case 'Todos':
                //fetchAll();
                currentSection = 'all';
                break;
            default:
                console.log('Opción desconocida');
        }
    }
});


//change profile image
document.getElementById('imageInput').addEventListener('change', function(event) {
    const fileInput = event.target;
    if (fileInput.files && fileInput.files[0]) {
        const formData = new FormData();
        formData.append('image', fileInput.files[0]);

        // Muestra una vista previa de la imagen seleccionada
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profileImage').src = e.target.result;
        };
        reader.readAsDataURL(fileInput.files[0]);

        // Envía la nueva imagen al servidor
        fetch('/api/projects/user/image', {
            method: 'POST',
            headers: {
                'Authorization': 'Bearer ' + token, // Asegúrate de que el token esté disponible
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            if (data.success) {
                console.log("success")
                // Actualiza la imagen de perfil para todos los visitantes
                // Esto es opcional si ya has actualizado la imagen con la vista previa
                // document.getElementById('profileImage').src = '/' + data.path;
            } else {
                // Manejar el error de subida de la imagen
                console.error('Error uploading image:', data.message);
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
});

// Listener para cambiar la imagen al hacer clic
document.getElementById('profileImage').addEventListener('click', function() {
    document.getElementById('imageInput').click();
});


function openForm() {
    document.getElementById("myForm").style.display = "flex";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

document.addEventListener('DOMContentLoaded', function() {
    const createdProjects = document.querySelector('.created-projects-container');
        const mentorContainer = document.querySelector('.mentorContainer');



                createdProjects.innerHTML = ''; 
                createdProjects.style.display = 'none';
                mentorContainer.innerHTML = ''; 
                mentorContainer.style.display = 'none';

    let currentPage = 1; 
    let totalPages = 1; 

    let currentPageProjects = 1;
    let totalPagesProjects = 1; 
    document.querySelector('.buttonMain').classList.add('buttonMain-selected'); 
   
    getToken().then(() => {
        fetchUserInfo();
        fetchUserProjectsSummary();
        fetchUserProjects();
        
    });

    document.getElementById('projectForm').addEventListener('submit', async function(e) {
        e.preventDefault(); // Prevenir el envío por defecto

        const formData = new FormData(e.target);
        const data = Object.fromEntries(formData.entries());

        // Obtener la fecha actual y formatearla
        const today = new Date();
        const formattedDate = today.getDate().toString().padStart(2, '0') + '-' + (today.getMonth() + 1).toString().padStart(2, '0') + '-' + today.getFullYear();
        data.date = formattedDate; // Ajustar la fecha automáticamente

        try {
            const response = await fetch('http://localhost:8000/api/projects', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer '+ token
                },
                body: JSON.stringify(data)
            });

            const jsonResponse = await response.json();

            if (!response.ok) {
                // Mostrar errores de validación
                const errorsContainer = document.getElementById('formErrors');
                errorsContainer.innerHTML = jsonResponse.message + ': ' + jsonResponse.data.join(', ');
            } else {
                // Si el proyecto se crea correctamente
                closeForm(); // Asume que esta función cierra el formulario
                document.getElementById('projectForm').reset(); // Limpiar el formulario
                fetchProjects(); // Recarga la lista de proyectos
                fetchUserProjectsSummary();
            }
        } catch (error) {
            console.error('Error creating project:', error);
        }
    });
});
let currentPage = 1; // Inicializa la página actual

async function fetchProjects(resetPage = false) {

    if (resetPage) {
        currentPage = 1; 
    }
    
    const url = `http://localhost:8000/api/projects?page=${currentPage}`;
    try {
        const response = await fetch(url, {
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token,
            },
        });

        if (response.ok) {
            const json = await response.json();
            const projects = json.data.data;
            totalPages = json.data.last_page; // Actualiza el total de páginas

           
            // Añade nuevos proyectos al contenedor
            projects.forEach(project => {
                createCard({
                    id: project.id,
                    logo: project.logo,
                    title: project.title,
                    company: project.company,
                    sector: project.sector,
                    description: project.description,
                    date: project.date,
                    education_level: project.education_level,
                    button1: "Marketing",
                    button2: "Legal",
                    button3: "Engineering",
                    button4: "Tech",
                    icon1: "/icons/green.png",
                    icon2: "/icons/red.png",
                    icon3: "/icons/heart.png",
                    icon4: "/icons/star.png"
                });
            });

            // Oculta el botón "Show More" si no hay más proyectos por cargar
            const showMoreButton = document.getElementById('showMore');
            if (currentPage >= totalPages) {
                showMoreButton.disabled = true; // Deshabilita el botón
            } else {
                showMoreButton.disabled = false; // Habilita el botón
            }

        } else {
            console.error('Failed to fetch projects:', response.statusText);
        }
    } catch (error) {
        console.error('Error fetching projects:', error);
    }
}



document.getElementById('showMore').addEventListener('click', () => {
    switch (currentSection) {
        case 'projects':
            currentPage++; // Incrementa la página actual para proyectos
            fetchProjects(); // Carga la siguiente página de proyectos
            break;
        case 'mentors':
            // Aquí deberías tener una variable para seguir la paginación de mentores, por ejemplo, currentMentorPage
            currentMentorPage++; 
            fetchMentors(); // Carga la siguiente página de mentores
            break;
        case 'createdProjects':
            currentCreatedPage++; // Incrementa la página actual para proyectos
            fetchCreatedProjects(); // Carga la siguiente página de proyectos
            break;
        // Agrega casos adicionales para 'students', etc.
    }
});



function createCard(project) {
    // Crear la tarjeta y sus elementos
    const card = document.createElement('div');
    card.className = 'card-exemple';
    card.setAttribute('data-project-id', project.id);
    //console.log("projectes amb id: ", project.id)

    const img = document.createElement('img');
    img.src = project.logo;
    img.alt = "Logo";
    img.className = "logo";

    const title = document.createElement('h6');
    title.className = "project-title";
    title.textContent = project.title;

    const company = document.createElement('p');
    company.className = "company";
    company.textContent = project.company;

    const sector = document.createElement('p');
    sector.className = "sector";
    sector.textContent = project.sector;

    const description = document.createElement('p');
    description.className = "description";
    description.textContent = project.description;

    const budget = document.createElement('div');
    budget.className = "budget";
    const budgetHeader = document.createElement('div');
    budgetHeader.className = "budget-header";
    const budgetTitle = document.createElement('p');
    budgetTitle.className = "budget-title";
    budgetTitle.textContent = project.education_level;
    budgetHeader.appendChild(budgetTitle);
    budget.appendChild(budgetHeader);

    const dateContainer = document.createElement('div');
    dateContainer.className = "date-container";
    const date = document.createElement('div');
    date.className = "date";
    const clockIcon = document.createElement('img');
    clockIcon.src = "/icons/clock-icon.png";
    clockIcon.alt = "Clock icon";
    clockIcon.className = "clock-icon";
    const dateText = document.createElement('p');
    dateText.className = "date-text";
    dateText.textContent = project.date;
    date.appendChild(clockIcon);
    date.appendChild(dateText);
    dateContainer.appendChild(date);

    const buttonRow = document.createElement('div');
    buttonRow.className = "button-row";
    const button1 = document.createElement('button');
    button1.className = "blue-button";
    button1.textContent = project.button1;
    const button2 = document.createElement('button');
    button2.className = "blue-button";
    button2.textContent = project.button2;
    buttonRow.appendChild(button1);
    buttonRow.appendChild(button2);

    const buttonRow2 = document.createElement('div');
    buttonRow2.className = "button-row-2";
    const button3 = document.createElement('button');
    button3.className = "blue-button";
    button3.textContent = project.button3;
    const button4 = document.createElement('button');
    button4.className = "blue-button";
    button4.textContent = project.button4;
    buttonRow2.appendChild(button3);
    buttonRow2.appendChild(button4);

// Creación de un contenedor adicional para los botones de interacción y el botón de abrir
const interactionContainer = document.createElement('div');
interactionContainer.className = "interaction-container";

// Creación y configuración de buttonsIcons como antes
const buttonsIcons = document.createElement('div');
buttonsIcons.className = "buttons-icons";

// Supongamos que tienes un objeto que mapea iconKey a type
const iconTypeMapping = {
    "icon1": "saved",
    "icon2": "dislike",
    "icon3": "like",
    "icon4": "match"
};

// Creación de los botones de interacción basados en los tipos definidos
const iconButtons = ["icon1", "icon2", "icon3", "icon4"].map(iconKey => {
    const button = document.createElement('button');
    button.className = "button-icon";
    button.setAttribute('data-type', iconTypeMapping[iconKey]); // Asigna el tipo de interacción
    
    const img = document.createElement('img');
    img.src = project[iconKey];
    img.alt = `Icon ${iconKey}`;
    button.appendChild(img);
    
    return button;
});

// Añade los botones de interacción al contenedor buttonsIcons
iconButtons.forEach(button => buttonsIcons.appendChild(button));

// Añadir buttonsIcons al contenedor interactionContainer
interactionContainer.appendChild(buttonsIcons);

// Creación del botón de abrir
const openButton = document.createElement('button');
openButton.className = "open-button";
openButton.innerHTML = ">"; // Contenido del botón
// Añadir el botón de abrir al contenedor interactionContainer
openButton.addEventListener('click', () => showProjectDetails(project.id));

interactionContainer.appendChild(openButton);

// Añadir todos los elementos a la tarjeta, incluyendo el nuevo contenedor interactionContainer
card.appendChild(img);
card.appendChild(title);
card.appendChild(company);
card.appendChild(sector);
card.appendChild(description);
card.appendChild(budget);
card.appendChild(dateContainer);
card.appendChild(buttonRow);
card.appendChild(buttonRow2);
card.appendChild(interactionContainer); // Ahora se añade el interactionContainer

// Finalmente, añadir la tarjeta completa al contenedor de tarjetas
document.querySelector('.cardContainer').appendChild(card);

}

//Method to generate token
let token;

async function getToken() {
    console.log('Obteniendo token...');
    try {
        let token_url = 'http://localhost:8000/token';
        const response = await fetch(token_url, {
            headers: {
                'Accept': 'application/json',
                'Content-type': 'application/json'                    
            }
        });
        if (response.ok) {
            const json = await response.json();
            token = json.token;
            console.log("Token obtenido: ", token);

            // Ahora que tenemos el token, llamamos a fetchProjects
            fetchProjects();

        } else {
            console.log('Error obteniendo el token');
            showMessages('error', 'Error accediendo a las datos remotos.');
        }
    } catch (error) {
        console.error('Error de red imprevisto', error);
        showMessages('error', 'Error de red imprevisto.');
    }
}

function handleButtonClick() {
    // Muestra la ventana modal
    const modal = document.getElementById('confirmationModal');
    const projectId = event.target.closest('.project-card-saved').getAttribute('data-project-id');
    modal.style.display = "block";

    // Cuando el usuario hace clic en "Cancel", cierra la ventana modal
    document.getElementById('cancelButton').onclick = function() {
        modal.style.display = "none";
    };

    // Cuando el usuario hace clic en "Yes", realiza la acción deseada
    document.getElementById('confirmButton').onclick = function() {
        //console.log("Acción confirmada!");
        modal.style.display = "none";
        removeInteraction(projectId);
        // Aquí puedes añadir la lógica para deshacer la interacción con el proyecto
        // Por ejemplo, enviar una solicitud al servidor para deshacer la interacción
    };
}

// Asegúrate de agregar este listener solo una vez y no dentro de un bucle para evitar múltiples asignaciones
window.onclick = function(event) {
    const modal = document.getElementById('confirmationModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
};


async function fetchUserProjectsSummary() {
    const url = 'http://localhost:8000/api/projects/user/summary';
    try {
        const response = await fetch(url, {
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token,
            },
        });

        if (response.ok) {
            const json = await response.json();
            const logosContainer = document.getElementById('userProjectLogos');
            logosContainer.innerHTML = ''; // Limpiar el contenedor

            // Actualizar el contador de proyectos del usuario
            document.querySelector('.yours-projects-section h6:nth-of-type(1)').textContent = `Tus proyectos(${json.totalProjects})`;

            // Añadir logos al contenedor
            json.logos.forEach(logo => {
                const img = document.createElement('img');
                img.src = logo.logo; // Asume que 'logo' es la propiedad que contiene la URL del logo
                img.alt = "Project Logo";
                img.className = "image-project";
                logosContainer.appendChild(img);
            });
        } else {
            console.error('Error fetching user projects summary');
        }
    } catch (error) {
        console.error('Error:', error);
    }
}


//function to load interacted projects
async function fetchUserProjects(page = 1) {
    const url = `http://localhost:8000/api/projects/user/saved?page=${page}`;
    try {
        const response = await fetch(url, {
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token,
            },
        });

        if (response.ok) {
            const json = await response.json();
            const projectsGrid = document.querySelector('.project-grid');
            projectsGrid.innerHTML = ''; // Limpiar el contenedor
            console.log(json)
            totalPagesProjects = json.projects.last_page;
            currentPageProjects = json.projects.current_page;

            json.projects.data.forEach(project => {
                // Determinar el ícono basado en el tipo
                let iconPath;
                switch (project.pivot.type) {
                    case "like":
                        iconPath = "/icons/heart.png";
                        break;
                    case "saved":
                        iconPath = "/icons/green.png";
                        break;
                    case "match":
                        iconPath = "/icons/star.png";
                        break;
                    default:
                        iconPath = "/icons/red.png"; // Asumiendo que tienes un ícono predeterminado
                }

                const projectCard = document.createElement('div');
                projectCard.className = 'project-card-saved';
                projectCard.setAttribute('data-project-id', project.id);

                projectCard.innerHTML = `
                    <img src="${project.logo}" alt="Project" class="project-card-image">
                    <h6>${project.title}</h6>
                    <p>${project.company}</p>
                    <p>${project.sector}</p>
                    <img src="${iconPath}" alt="icon" class="icon-project" onclick="handleButtonClick()">`;

                projectsGrid.appendChild(projectCard);
            });

            currentPageProjects = json.projects.current_page; // Actualiza la página actual
            document.getElementById('prevPageSaved').disabled = !json.projects.prev_page_url;
            document.getElementById('nextPageSaved').disabled = !json.projects.next_page_url;
        } else {
            console.error('Error fetching user projects');
        }
    } catch (error) {
        console.error('Error:', error);
    }
}

// Añade escuchas de eventos a los botones de paginación
document.getElementById('prevPageSaved').addEventListener('click', () => {
    if (currentPageProjects > 1) {
        fetchUserProjects(--currentPageProjects);
    }
});

document.getElementById('nextPageSaved').addEventListener('click', () => {
    if (currentPageProjects < totalPagesProjects) {
        fetchUserProjects(++currentPageProjects);
    }
});



//get user info (name, occupation, profile image)
async function fetchUserInfo() {
    const url = 'http://localhost:8000/api/projects/user/info';
    try {
        const response = await fetch(url, {
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token,
            },
        });

        if (response.ok) {
            const json = await response.json();
            // Suponiendo que has obtenido la respuesta del servidor en una variable `response`
            const user = json.data;
            //console.log(user)
            document.querySelector('.profile-info img').src = user.image;
            document.querySelector('.profile-info .user-name').textContent = user.name;
            document.querySelector('.profile-info .user-occupation').textContent = user.occupation;
        

        } else {
            console.error('Error fetching user info');
        }
    } catch (error) {
        console.error('Error:', error);
    }
}

//function to create interaction btween project and user
document.querySelector('.cardContainer').addEventListener('click', function(event) {
    const button = event.target.closest('.button-icon');
    if (button) {
        const projectId = button.closest('.card-exemple').getAttribute('data-project-id');
        const interactionType = button.getAttribute('data-type');
        //console.log("datatype: ", interactionType)

        // Asume que 'token' está disponible en tu alcance
        fetch(`/api/projects/${projectId}/interact`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ type: interactionType }),
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message);
            // Aquí puedes actualizar la UI para reflejar la interacción
            fetchUserProjects();
        })
        .catch(error => console.error('Error:', error));
    }
});

//function to remove interaction between project and user
async function removeInteraction(projectId) {
    try {
        const response = await fetch(`/api/projects/${projectId}/interaction`, {
            method: 'DELETE',
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token,
                'Content-Type': 'application/json',
            },
        });

        const data = await response.json();

        if (response.ok) {
            console.log(data.message);
            // Aquí puedes actualizar la UI, por ejemplo, eliminando la tarjeta del proyecto o actualizando el ícono
            // Podrías llamar a fetchUserProjects() para refrescar la lista de proyectos
            fetchUserProjects();
        } else {
            console.error('Failed to remove interaction:', data.message);
        }
    } catch (error) {
        console.error('Error:', error);
    }
}


// Cargar información de mentores y mostrarla en el mentorContainer
let currentMentorPage = 1; // Esta variable debe estar accesible al nivel de tus funciones de paginación

async function fetchMentors(resetPage = false) {
  if (resetPage) {
    currentMentorPage = 1; // Si resetPage es true, reiniciar a la primera página
  }
const mentorContainer = document.querySelector('.mentorContainer');

const url = `http://localhost:8000/api/mentors?page=${currentMentorPage}`;

  try {
    const response = await fetch(url, {
      headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + token, // Asegúrate de que el token es correcto y accesible
      },
    });

    if (response.ok) {
      const json = await response.json();
      const mentors = json.data;
      totalPages = json.data.last_page; // Actualiza el total de páginas
      console.log("mentors: ", mentors)

      mentors.data.forEach(mentor => {
        createCardMentor(mentor, mentorContainer);
      });

       // Oculta el botón "Show More" si no hay más proyectos por cargar
       const showMoreButton = document.getElementById('showMore');
            if (currentPage >= totalPages) {
                showMoreButton.disabled = true; // Deshabilita el botón
                console.log("boto disabled")
            } else {
                showMoreButton.disabled = false; // Habilita el botón
                console.log("boto not disabled")
            }

    } else {
      console.error('Failed to fetch mentors:', response.statusText);
    }
  } catch (error) {
    console.error('Error fetching mentors:', error);
  }
}

function createCardMentor(mentor, mentorContainer) {
  const card = document.createElement('div');
  card.className = 'card-exemple-mentor';

  // Convierte el string de expertises en un array de especialidades
  const expertises = mentor.expertise.split(',');

  // Crear mini tarjetas para cada especialidad
  const expertiseTags = expertises.map(expertise => `<span class="expertise-tag">${expertise.trim()}</span>`).join('');

  card.innerHTML = `
    <img src="${mentor.user.image}" alt="Imagen del mentor" class="mentor-image">
    <div class="card-content">
    <h3 class="mentor-name">${mentor.user.name}</h3>
    <p>Email: ${mentor.user.email}</p>
    <p>Actualmente trabajando para ${mentor.company}</p>
      <p>${mentor.career_summary}</p>
      <div class="expertise-container">${expertiseTags}</div>
    </div>
  `;

  mentorContainer.appendChild(card);

  card.querySelector('.mentor-name').addEventListener('click', function() {
    console.log('Se hizo clic en el nombre del mentor:', mentor.user.name);
    fetchMentorDetails(mentor.id);
    // Aquí puedes agregar la lógica adicional que desees
  });
}

//mentor details
async function fetchMentorDetails(mentorId) {
  const url = `http://localhost:8000/api/mentors/${mentorId}`;
  try {
    const response = await fetch(url, {
      headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + token,
      },
    });

    if (response.ok) {

      const json = await response.json();
      const mentorDetails = json.data;

      showMentorDetails(mentorDetails);
    } else {
      console.error('Failed to fetch mentor details:', response.statusText);
    }
  } catch (error) {
    console.error('Error fetching mentor details:', error);
  }
}

function showMentorDetails(mentorDetails) {
  const mentorDetailsContainer = document.querySelector('.mentorDetailsContainer');
  // Ocultar la lista de mentores y cualquier otro contenido que no sea necesario
  const showMoreButton = document.getElementById('showMore');
  document.querySelector('.mentorContainer').style.display = 'none';
  mentorDetailsContainer.style.display = 'block'; 
  showMoreButton.style.display = 'none';
  console.log(mentorDetails)
  // Estructura del perfil del mentor
  mentorDetailsContainer.innerHTML = `
    <div class="mentor-details-card">
    <button class="back-button-mentor">←</button> 
      <div class="mentor-details-top">
      <a href="https://${mentorDetails.linkedin}" class="mentor-social-link" target="_blank">
  <img src="/images/linkedin-logo.png" alt="LinkedIn Logo" class="linkedin-logo">
</a>

    
      </div>
      <img src="${mentorDetails.user.image}" alt="${mentorDetails.user.name}" class="mentor-profile-image">
      <div class="mentor-details-bottom">
        <div class="mentor-personal-info">
          <h2>${mentorDetails.user.name}</h2>
          <p class="mentor-bio">${mentorDetails.career_summary}</p>
          <p class="mentor-bio">Motivación: ${mentorDetails.motivation}</p>
          <p class="location">
            <span class="location-icon"><img src="/images/location-icon.png" alt="Ubicación"></span>
            ${mentorDetails.location}
          </p>


        </div>
        <div class="mentor-skills">
          <h3>Skills</h3>
          <div class="mentor-skills">
             ${mentorDetails.expertise.split(',').map(skill => `<span class="mentor-skill-tag">${skill.trim()}</span>`).join('')}
          </div>
        </div>
      </div>
    </div>
  `;

  // Dentro de tu función showMentorDetails, después de establecer el innerHTML
const backButton = mentorDetailsContainer.querySelector('.back-button-mentor');
backButton.addEventListener('click', () => {
  // Aquí puedes llamar a una función para volver a mostrar la lista de mentores
  // y ocultar la tarjeta de detalles del mentor.
  mentorDetailsContainer.style.display = 'none';
  document.querySelector('.mentorContainer').style.display = 'flex';
});

}






//show project details
function showProjectDetails(projectId) {
    const cardContainer = document.querySelector('.cardContainer');
    const projectDetailsContainer = document.querySelector('.projectDetailsContainer');
    const showMoreButton = document.getElementById('showMore');

    // Ocultar el contenedor de tarjetas y los controles de paginación mientras se muestran los detalles
    cardContainer.style.display = 'none';
    showMoreButton.style.display = 'none';

    // Limpiar el contenedor de detalles del proyecto antes de cargar nuevos detalles
    projectDetailsContainer.innerHTML = '';

    // Creación del botón para regresar a la vista de proyectos
    const backButton = document.createElement('button');
    backButton.innerHTML = '←'; // O puedes usar un ícono
    backButton.className = 'back-button';
    backButton.onclick = function() {
        // Mostrar nuevamente el contenedor de tarjetas y los controles de paginación
        cardContainer.style.display = 'flex';
        showMoreButton.style.display = 'block';

        // Ocultar y limpiar el contenedor de detalles del proyecto
        projectDetailsContainer.style.display = 'none';
        projectDetailsContainer.innerHTML = '';
    }; 

    let currentCreatedPage = 1;
    // Asumiendo que tienes una función que obtiene los detalles del proyecto basada en projectId
    fetchProjectDetails(projectId).then(project => {
        // Mostrar el contenedor de detalles del proyecto
        projectDetailsContainer.style.display = 'block';

        // Creación de la tarjeta de detalles del proyecto
        const detailsCard = document.createElement('div');
        detailsCard.className = 'project-details-card';
        // Aquí añadirías el contenido de la tarjeta, basado en los detalles del proyecto
        detailsCard.innerHTML = `
            <h3>${project.title}</h3>
            <br>
            <img src="${project.image}" alt="Descripción de la imagen" class="project-image">
            <br>
            <p>${project.description}</p>
            <br>
            <p>${project.content}</p>
        `;

        // Añadir el botón de regreso y la tarjeta de detalles al contenedor de detalles del proyecto
        projectDetailsContainer.appendChild(backButton);
        projectDetailsContainer.appendChild(detailsCard);
    });
}


//fetch project details
async function fetchProjectDetails(projectId) {
    try {
        const response = await fetch(`/api/projects/${projectId}`, {
            headers: { 'Accept': 'application/json', 'Authorization': 'Bearer ' + token },
        });

        if (response.ok) {
            const data = await response.json();
            const project = data.data; 
            console.log("data show: ", project )
            return project;
        } else {
            throw new Error('Project details could not be fetched.');
        }
    } catch (error) {
        console.error(error);
        throw new Error('An error occurred while fetching project details.');
    }
}


let currentCreatedPage = 1;
async function fetchCreatedProjects(resetPage = false) {

    if(resetPage) {
        currentCreatedPage = 1;
    }
  // Asume que currentCreatedPage es global o está adecuadamente inicializada
  const url = `http://localhost:8000/api/projects/user/created?page=${currentCreatedPage}`;

  try {
    const response = await fetch(url, {
      method: 'GET',
      headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + token,
      },
    });

    if (response.ok) {
      const data = await response.json();
      console.log(data); // Verificación

      const createdProjects = data.projects.data;
      const totalPages = data.projects.last_page;
      const currentPage = data.projects.current_page;
      const creatorName = data.projects.data[0].user.name;
      
      const container = document.getElementById('createdProjects');



      createdProjects.forEach(project => {
        cardProjectCreated(project, creatorName); // Asume que esta función ya maneja correctamente un único proyecto
      });

      // Ajustar el estado del botón "Mostrar más" basado en la paginación
      const showMoreButton = document.getElementById('showMore');
      showMoreButton.disabled = currentPage >= totalPages;
    } else {
      console.error('Error al recuperar los proyectos creados por el usuario:', response.statusText);
    }
  } catch (error) {
    console.error('Error en la petición fetch:', error);
  }
}

function cardProjectCreated(project, creator) {
    const container = document.getElementById('createdProjects'); // Asegúrate de que el ID coincide con tu contenedor

    // Crear el elemento de la tarjeta
    const card = document.createElement('div');
    card.className = 'card-project-created';
   
    // Agregar contenido a la tarjeta
    card.innerHTML = `
        <div class="project-info">
            <img src="${project.logo}" alt="Logo-created" class="logo-created">
            <div class="project-details-created">
                <h5 class="title-created">${project.title}</h5>
                <p class="username-created">Creador: ${creator}</p>
                <p class="date-created">Creación: ${project.date}</p>
                <p class="description-created">${project.description}</p>
            </div>
        </div>
        <div class="button-container-created">
            <!-- Botones -->
            <button onclick="editProject(${project.id})" class="button-project-created">Editar</button>
            <button onclick="deleteProject(${project.id})" class="button-project-created">Eliminar</button>
            <button class="button-project-created" id="button-invite">
                <img src="/icons/add-user.png" alt="Invitar" class="add-user">
            </button>
        </div>
        <button class="open-button-created">></button> 
    `;

    // Añadir la tarjeta al contenedor
    container.appendChild(card);

    // Obtener el botón de invitar dentro de la tarjeta
    const inviteButton = card.querySelector('#button-invite');
    
    // Añadir el evento de clic al botón de invitar
    inviteButton.addEventListener('click', function(event) {
        const projectId = project.id; // Obtener el id del proyecto
        document.getElementById('projectId').value = projectId; // Asignar el projectId al campo oculto
        document.getElementById('invitationModal').style.display = 'block'; // Mostrar el modal
    });
}


// Funciones de ejemplo para editar y eliminar, necesitarás implementar la lógica
function editProject(projectId) {
    console.log('Editar proyecto', projectId);
    // Implementar la lógica para editar el proyecto
}

function deleteProject(projectId) {
    console.log('Eliminar proyecto', projectId);
    // Implementar la lógica para eliminar el proyecto
}

function showCreatedDetails(projectId) {

}


// Añadir evento de clic al hacer clic en myProjectsSection
document.getElementById('myProjectsSection').addEventListener('click', function() {


    const createdProjects = document.querySelector('.created-projects-container');
    const mentorContainer = document.querySelector('.mentorContainer');
    const cardContainer = document.querySelector('.cardContainer');
    const mentorDetailsContainer = document.querySelector('.mentorDetailsContainer');
    const projectDetailsContainer = document.querySelector('.projectDetailsContainer'); 
    const showMoreButton = document.getElementById('showMore');

    createdProjects.innerHTML = ''; 
    cardContainer.innerHTML = ''; 
    mentorContainer.innerHTML = ''; 
    cardContainer.style.display = 'none';
    mentorContainer.style.display = 'none';
    projectDetailsContainer.innerHTML = ''; 
    projectDetailsContainer.style.display = 'none';
    mentorDetailsContainer.innerHTML = ''; 
    mentorDetailsContainer.style.display = 'none';

    createdProjects.style.display = 'flex';
    showMoreButton.style.display = 'block';
    currentSection = 'createdProjects';

    // Remover los estilos de otros elementos
    document.getElementById('joinedProjectsSection').style.backgroundColor = ''; // Eliminar el color de fondo
    document.getElementById('joinedProjectsSection').style.boxShadow = ''; // Eliminar la sombra
    

    // Agregar estilos al elemento actual
    this.style.backgroundColor = '#f0f0f0'; // Cambiar el color de fondo
    this.style.boxShadow = '0 0 5px rgba(0, 0, 0, 0.3)'; // Añadir sombra
    

    document.querySelectorAll('.buttonContainerMain button').forEach(btn => {
        btn.classList.remove('buttonMain-selected');
        btn.classList.add('buttonMain');
    });

    fetchCreatedProjects(true);


});

// Añadir evento de clic al hacer clic en joinedProjectsSection
document.getElementById('joinedProjectsSection').addEventListener('click', function() {
    // Remover los estilos de otros elementos
    document.getElementById('myProjectsSection').style.backgroundColor = ''; // Eliminar el color de fondo
    document.getElementById('myProjectsSection').style.boxShadow = ''; // Eliminar la sombra

    // Agregar estilos al elemento actual
    this.style.backgroundColor = '#f0f0f0'; // Cambiar el color de fondo
    this.style.boxShadow = '0 0 5px rgba(0, 0, 0, 0.3)'; // Añadir sombra

    document.querySelectorAll('.buttonContainerMain button').forEach(btn => {
        btn.classList.remove('buttonMain-selected');
        btn.classList.add('buttonMain');
    });


});


document.querySelectorAll('.button-project-created img').forEach(button => {
    button.addEventListener('click', function(event) {
        const projectId = this.getAttribute('data-project-id'); // Asegúrate de tener este atributo en tu botón
        document.getElementById('projectId').value = projectId; // Asigna el projectId al campo oculto
        document.getElementById('invitationModal').style.display = 'block'; // Muestra el modal
    });
});

// Para cerrar el modal
document.querySelector('.close').addEventListener('click', function() {
    document.getElementById('invitationModal').style.display = 'none';
});




</script>
@endsection
