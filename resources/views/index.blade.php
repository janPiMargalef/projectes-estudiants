@extends('layouts.app')
@section('content')
<body>
    <div class="wrapper">
        <div class="profile-section">
            <!-- Apartat de la foto de perfil i nom d'usuari -->
            <div class="profile-info">
            <img src="/images/profile-image.png" alt="Foto de perfil">
                <h6 class="user-name">CARLA GARCÍA</h6>
                <h6>Researcher</h6>
                <h3 class="user-name">KRUSH PROJECTS</h3>
            </div>
            <!-- Apartat dels projectes de l'usuari -->
            <div class="user-projects">
                <br>
                <h6>MY PROJECTS</h6>
                <br>
                <h6>Yours(1)</h6>
                <img src="/projectes/proj2.jpg" alt="Projecte 2" class="image-project">
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
    <div class="project-grid">
        <!-- Aquí es pot afegir la lògica per mostrar els projectes -->
        <div class="project-card-company">
            <img src="/projectes/proj5.jpg" alt="Project 5" class="project-card-image">
            <h6>COMPANY</h6>
            <p>project</p>
            <p>sector</p>
            <img src="/icons/heart.png" alt="icon 1" class="icon-project">
        </div>

        <div class="project-card-project">
            <img src="/projectes/proj6.jpg" alt="Project 6" class="project-card-image">
            <h6>PROJECT TITLE</h6>
            <p>Company</p>
            <p>Sector</p>
            <img src="/icons/heart.png" alt="icon 2" class="icon-project">
        </div>

        <div class="project-card-project">
            <img src="/projectes/proj7.jpg" alt="Project 7" class="project-card-image">
            <h6>PROJECT TITLE</h6>
            <p>Company</p>
            <p>Sector</p>
            <img src="/icons/star.png" alt="icon 1" class="icon-project">
        </div>

        <div class="project-card-grant">
            <img src="/projectes/proj8.jpg" alt="Project 8" class="project-card-image">
            <h6>GRANT NAME</h6>
            <p>Company</p>
            <p>Sector</p> 
            <img src="/icons/green.png" alt="icon 1" class="icon-project">
        </div>
        <!-- Afegir més projectes segons sigui necessari -->
    </div>
    <img src="/projectes/menu-contextual.png" alt="Icono ......" class="menu-contextual">
</div>
 
            <!-- Apartat principal amb les tarjetes dels projectes -->
            <div class="project-cards">
            <div class="buttonContainerMain">
                    <button class="buttonMain">Projects</button>
                    <button class="buttonMain">Partners</button>
                    <button class="buttonMain">Money</button>
                    <button class="buttonMain">All</button>
                    <img src="/icons/filter-icon.png" alt="Filter icon" class="filter-icon">
                </div>


                <!-- Aquí es pot afegir la lògica per mostrar les tarjetes dels projectes -->
        <div class="cardContainer">

        <div class="card-exemple">
                <img src="/projectes/proj9.jpg" alt="Logo" class="logo">
                <h6 class="project-title">PROJECT TITLE</h6>
       
                <p class="company">Company</p>
                <p class="sector">Sector</p>
                <p class="description">Lorem ipsum dolor sit amet. Eum quia quia 33 accusantium sint et dolores itaque est quasi facilis ea nulla rerum.</p>
        <div class="budget">
                <div class="budget-header">
                    <p class="budget-title">BUDGET€</p>
                </div>
        </div>
        <div class="date-container">
            <div class="date">
                <img src="/icons/clock-icon.png" alt="Clock icon" class="clock-icon">
                <p class="date-text">24/02/2024</p>
            </div>
        </div>
        <div class="button-row">
            <button class="blue-button">Marketing</button>
            <button class="blue-button">Legal</button>
        </div>
        <div class="button-row-2">
            <button class="blue-button">Engineering</button>
            <button class="blue-button">Tech</button>
        </div>

        <div class="buttons-icons">
            <button class="button-icon"><img src="/icons/green.png" alt="Icon 1"></button>
            <button class="button-icon"><img src="/icons/red.png" alt="Icon 2"></button>
            <button class="button-icon"><img src="/icons/heart.png" alt="Icon 3"></button>
            <button class="button-icon"><img src="/icons/star.png" alt="Icon 4"></button>
            <button class="open-icon"><img src="/icons/flecha-icon.png" alt="Icon open source"></button>
        </div>

    </div><!--card -->
    <!--card acaba aquí -->

    <div class="card-exemple">
                <img src="/projectes/proj9.jpg" alt="Logo" class="logo">
                <h6 class="project-title">PROJECT TITLE</h6>
       
                <p class="company">Company</p>
                <p class="sector">Sector</p>
                <p class="description">Lorem ipsum dolor sit amet. Eum quia quia 33 accusantium sint et dolores itaque est quasi facilis ea nulla rerum.</p>
        <div class="budget">
                <div class="budget-header">
                    <p class="budget-title">BUDGET€</p>
                </div>
        </div>
        <div class="date-container">
            <div class="date">
                <img src="/icons/clock-icon.png" alt="Clock icon" class="clock-icon">
                <p class="date-text">24/02/2024</p>
            </div>
        </div>
        <div class="button-row">
            <button class="blue-button">Marketing</button>
            <button class="blue-button">Legal</button>
        </div>
        <div class="button-row-2">
            <button class="blue-button">Engineering</button>
            <button class="blue-button">Tech</button>
        </div>
        <div class="buttons-icons">
            <button class="button-icon"><img src="/icons/green.png" alt="Icon 1"></button>
            <button class="button-icon"><img src="/icons/red.png" alt="Icon 2"></button>
            <button class="button-icon"><img src="/icons/heart.png" alt="Icon 3"></button>
            <button class="button-icon"><img src="/icons/star.png" alt="Icon 4"></button>
            <button class="open-icon"><img src="/icons/flecha-icon.png" alt="Icon open source"></button>
        </div>
    </div><!--card -->
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
                <h6 class="events-title">Events</h6>
                <!-- Aquí es pot afegir la lògica per mostrar els events -->
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
        <form action="/submit_project" method="post">
            <label for="project_name">Project Name:</label><br>
            <input type="text" id="project_name" name="project_name"><br>
            <label for="company">Company:</label><br>
            <input type="text" id="company" name="company"><br>
            <label for="sector">Sector:</label><br>
            <input type="text" id="sector" name="sector"><br>
            <label for="budget">Budget:</label><br>
            <input type="text" id="budget" name="budget"><br><br>
            <button type="submit">Submit</button>
            <button type="button" onclick="closeForm()">Close</button>
        </form>
        
    </div>
</div>
</body>

<script>

function openForm() {
    document.getElementById("myForm").style.display = "flex";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}



</script>
@endsection
