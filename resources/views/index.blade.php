@extends('layouts.app')
@section('content')
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
                <br>
                <h6>MY PROJECTS</h6>
                <br>
                <h6>Yours(0)</h6>
                <div id="userProjectLogos"></div> <!--Projectes de l'usuari dinàmicament -->
                <br>
                <br>
                
                <h6>Joined(2)</h6>
                <img src="/projectes/proj3.jpg" alt="Projecte 3" class="image-project">
                <img src="/projectes/proj4.jpg" alt="Projecte 4" class="image-project">

                <div class="button-container">
                    <button class="buttonProjects">All</button>
                    <button class="buttonProjects" onclick="openForm()">Add</button>
                    <button class="buttonProjects">Join</button>
                </div>
                
            </div>
        </div>
        <div class="main-section">
            <!-- Apartat dels projectes guardats, matches, likes, etc. -->
            <div class="saved-projects">
    <h6 class="main-title">MATCHES | SAVED | LIKE</h6>
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
                    <button class="buttonMain">Projects</button>
                    <button class="buttonMain">Mentors</button>
                    <button class="buttonMain">Students</button>
                    <button class="buttonMain">All</button>
                    <img src="/icons/filter-icon.png" alt="Filter icon" class="filter-icon">
                </div>


                <!-- Aquí es pot afegir la lògica per mostrar les tarjetes dels projectes -->
        <div class="cardContainer">

       
        </div>
        <div class="pagination-controls">
    <button class="pagination-button" id="prevPage"><---</button>
    <button class="pagination-button" id="nextPage">---></button>
</div>
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
    <h6 class="events-title">NEXT EVENTS</h6>
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
        <h2>Create Project</h2>
        <form id="projectForm">
            <label for="title">Project Title:</label><br>
            <input type="text" id="title" name="title"><br>
            <label for="logo">Logo:</label><br>
            <input type="text" id="logo" name="logo"><br>
            <label for="company">Company:</label><br>
            <input type="text" id="company" name="company"><br>
            <label for="sector">Sector:</label><br>
            <input type="text" id="sector" name="sector"><br>
            <label for="description">Description:</label><br>
            <input type="text" id="description" name="description"><br>
            <label for="budget">Budget:</label><br>
            <input type="text" id="budget" name="budget"><br><br>


            <button type="submit">Submit</button>
            <button type="button" onclick="closeForm()">Close</button>
        </form>
        <div id="formErrors" style="color: red;"></div>
    </div>
</div>

<!-- Modal de confirmación -->
<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <p>Are you sure you want to undo this action?</p>
        <button id="confirmButton">Yes</button>
        <button id="cancelButton">Cancel</button>
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


</body>

<script>

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
    let currentPage = 1; 
    let totalPages = 1; 

    let currentPageProjects = 1;
    let totalPagesProjects = 1; 

   
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

async function fetchProjects(page = 1) {
    const url = `http://localhost:8000/api/projects?page=${page}`;
    // Asume que 'token' está disponible en tu alcance
    try {
        const response = await fetch(url, {
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer '+ token
            },
        });

        if (response.ok) {
            const json = await response.json();
            const projects = json.data.data;
            //console.log("projecte: ", projects)
            totalPages = json.data.last_page;
            currentPage = json.data.current_page;

            // Limpia el contenedor antes de cargar nuevos proyectos
            document.querySelector('.cardContainer').innerHTML = '';
            projects.forEach(project => {
                createCard({
                    id: project.id,
                    logo: project.logo,
                    title: project.title,
                    company: project.company,
                    sector: project.sector,
                    description: project.description,
                    date: project.date,
                    budget: project.budget,
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
           // Actualizar estado de los botones de paginación
           document.getElementById('prevPage').disabled = currentPage <= 1;
            document.getElementById('nextPage').disabled = currentPage >= totalPages;
        } else {
            console.error('Failed to fetch projects:', response.statusText);
        }
    } catch (error) {
        console.error('Error fetching projects:', error);
    }
}




// Añade escuchas de eventos a los botones de paginación
document.getElementById('prevPage').addEventListener('click', () => {
    if (currentPage > 1) {
        fetchProjects(--currentPage);
    }
});

document.getElementById('nextPage').addEventListener('click', () => {
    if (currentPage < totalPages) {
        fetchProjects(++currentPage);
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
    budgetTitle.textContent = project.budget;
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
            document.querySelector('.user-projects h6:nth-of-type(2)').textContent = `Yours(${json.totalProjects})`;

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








</script>
@endsection
