<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin </title>
    <link rel="stylesheet" href="styles.css">
    <style>

body {

    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-image: url(./pp\ -\ Raccourci.lnk);
    background-size: cover;
    background-position: center;
}

header {
  
    color: #fff;
    padding:5px;
    text-align: center;
    position: relative;
    width: 100%;
    top: 0;
    z-index: 1000;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

header h1 {
    color: #000;
    margin: 0;
    font-size: 28px;
    font-weight: bold;
    text-transform: uppercase;
}

.navban {
    width: 100%;
  list-style: none;
  padding:-15px 0 ;
  margin: auto;
display: flex;
align-items: center;
justify-content: space-between;
}
.navban ul li {
  display: inline-block;
  margin: 0 20px;
  list-style: none;
  position: relative;
}

.navban ul li a {
  color: #000000;
  text-decoration: none;
  text-transform: uppercase;
}
.navban ul li::after {
content: '';
height: 3px;
width: 0;
background: #000000;
position: absolute;
left: 0;
bottom: -10px;
transition: 0.5s;

}
.navban ul li:hover:after {
    width: 100%;
   
    
    
}
.cards-container {
    
    display: flex;
   
    justify-content: space-around;
}

.card {
    position: relative;
    width: 300px;
    height: 300px; /* Adjust height to fit image */
    background-color: #f2f2f2;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    perspective: 1000px;
    box-shadow: 0 0 0 5px #7a6b6b80;
    transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    margin-bottom: 20px; /* Adjust margin between cards */
}

.card svg {
    width: 48px;
    fill: #333;
    transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(255, 255, 255, 0.2);
}

.card__content {
    position: relative;
    width: 100%;
    height: 100%;
    padding: 20px;
    box-sizing: border-box;
    text-align: center;
}

.card__image {
    width: 100%;
    height: auto;
    border-radius: 10px;
    margin-bottom: 15px;
}

.card__title {
    margin: 0;
    font-size: 24px;
    color: #333;
    font-weight: 700;
}

.card:hover svg {
    scale: 0;
}

.card__description {
    margin: 10px 0 0;
    font-size: 14px;
    color: #777;
    line-height: 1.4;
}




main {
    
    
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    padding: 100px 20px 20px;
}



.footer {
  position: relative;
  bottom: 0;
  width: 100%;
  background: #142641;
  min-height: 100px;
  padding: 20px 0;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  
}

.social-icon,
.menu {
    
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 10px 0;
  flex-wrap: wrap;
}

.social-icon__item,
.menu__item {
  list-style: none;
}

.social-icon__link {
  font-size: 2rem;
  color: #fff;
  margin: 0 10px;
  display: inline-block;
  transition: 0.5s;
}
.social-icon__link:hover {
  transform: translateY(-10px);
}

.menu__link {
  font-size: 1.2rem;
  color: #fff;
  margin: 0 10px;
  display: inline-block;
  transition: 0.5s;
  text-decoration: none;
  opacity: 0.75;
  font-weight: 300;
}

.menu__link:hover {
  opacity: 1;
}

.footer p {
  color: #fff;
  margin: 15px 0 10px 0;
  font-size: 1rem;
  font-weight: 300;
}



    </style>
</head>
<body>
 <header>

    
        
    </header>
    
    <main class="cards-container">
        <div class="card">
            <div class="card__content">
                <img src="img.jpg.jpg" alt="Results Image" class="card__image"> <!-- Replace 'results.jpg' with your image file -->
                <a href="gestion.php" class="card__title">gestion des profs</a>
                <p class="card__description">profs</p>
            </div>
        </div>
        <div class="card">
            <div class="card__content">
                <img src="img.jpg.jpg" alt="Moodle Image" class="card__image"> <!-- Replace 'moodle.jpg' with your image file -->
                <a href="../etudient/etdnmain.php" class="card__title">gestion des condidats</a>
                <p class="card__description">condidats</p>
            </div>
        </div>
        <div class="card">
            <div class="card__content">
                <img src="img.jpg.jpg" alt="Notifications Image" class="card__image"> <!-- Replace 'notifications.jpg' with your image file -->
                <a href="../class/class.php" class="card__title">affectation</a>
                <p class="card__description">affecter les condidats et le profs</p>
            </div>
        </div>
        <div class="card">
            <div class="card__content">
                <img src="img.jpg.jpg" alt="inscrire" class="card__image"> <!-- Replace 'notifications.jpg' with your image file -->
                <a href="../class/ajtclass.php" class="card__title">ajouter les classes </a>
                <p class="card__description"></p>
            </div>
        </div>
        <div class="card">
            <div class="card__content">
                <img src="img.jpg.jpg" alt="inscrire" class="card__image"> <!-- Replace 'notifications.jpg' with your image file -->
                <a href="../class/class1.php" class="card__title"> classes </a>
                <p class="card__description"></p>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="waves">
          <div class="wave" id="wave1"></div>
          <div class="wave" id="wave2"></div>
          <div class="wave" id="wave3"></div>
          <div class="wave" id="wave4"></div>
        </div>
        <ul class="social-icon">
          <li class="social-icon__item"><a class="social-icon__link" href="#">
              <ion-icon name="logo-facebook"></ion-icon>
            </a></li>
          <li class="social-icon__item"><a class="social-icon__link" href="#">
              <ion-icon name="logo-twitter"></ion-icon>
            </a></li>
          
          <li class="social-icon__item"><a class="social-icon__link" href="#">
              <ion-icon name="logo-instagram"></ion-icon>
            </a></li>
        </ul>
        <ul class="menu">
          <li class="menu__item"><a class="menu__link" href="main.html">Home</a></li>
          <li class="menu__item"><a class="menu__link" href="about us.html">About us</a></li>
          <li class="menu__item"><a class="menu__link" href="conta.html">Contact</a></li>
    
        </ul>
        <p>&copy;2024 ABAZIZ MOHAMED | All Rights Reserved</p>
      </footer>
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
