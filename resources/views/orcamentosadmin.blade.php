<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orçamentos</title>
    <link rel="stylesheet" href="/css/orcamentoadmin.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <!--NAVBAR + IMAGEM -> Para orcamentos/admin -->
    <nav class="navbar">
        <div class="content">
          <div class="logo">
            <a href="/index">ZAC</a>
          </div>
          <ul class="menu-list">
            <div class="icon cancel-btn">
              <i class="fas fa-times"></i>
            </div>
            <li><a href="/sobrenos">Sobre Nós</a></li>
            <li><a href="/servicos">Serviços</a></li>
            <li><a href="/galeria">Catálogo</a></li>
            <li><a href="/orcamentos">Orçamentos</a></li>
            <li><a href="/contactos">Contactos</a></li>
            @if(Auth::user())
                      <li>
                        <a href=""
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><span style="margin-right: 10px; margin-left:5px; color:rgb(255, 135, 37);" >{{ Auth::user()->name }}</span>{{('Logout')}}<i class="fas fa-sign-out-alt" style="margin-left: 5px;"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf                        
                        </form>
                      </li>
                    @else
                      <li><a href="{{ route('login') }}"><button class="btnnavbar">Login/Registo<i class="fas fa-sign-in-alt" style="margin-left: 5px;"></i></button></a></li>
                    @endif
            
          </ul>
          <div class="icon menu-btn">
            <i class="fas fa-bars"></i>
          </div>
        </div>
      </nav>
      <div class="banner"></div>
      <div class="about">
        <div class="content">
          <div class="title" style="margin-top: 10px;">Solicitar Orçamento</div>
          <p>Caso esteja interessado em obter um orçamento para qualquer um dos nossos serviços, poderá fazê-lo através do seguinte formulário, preenchendo todos os campos necessários, para que possamos apresentar-lhe a solução mais adequada à concretização do seu projeto.</p><p><strong>Este é o primeiro passo para concretizar os seus planos!</p>                     
      </div>
    
      <script>
        const body = document.querySelector("body");
        const navbar = document.querySelector(".navbar");
        const menuBtn = document.querySelector(".menu-btn");
        const cancelBtn = document.querySelector(".cancel-btn");
        menuBtn.onclick = ()=>{
          navbar.classList.add("show");
          menuBtn.classList.add("hide");
          body.classList.add("disabled");
        }
        cancelBtn.onclick = ()=>{
          body.classList.remove("disabled");
          navbar.classList.remove("show");
          menuBtn.classList.remove("hide");
        }
        window.onscroll = ()=>{
          this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
        }
      </script>











@foreach($orcamentos as $orcamento)
<div class="fs0 orc_pag" style="margin-top: 150px;">
            
    <div class="container">
  <form method="post" action="{{route('orcamentos.store')}}">
    @csrf
  <div class="row">
    <div class="col-25">
      <label for="fname">Nome Completo</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="firstname" placeholder="{{ $orcamento->name}}" disabled>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Email</label>
    </div>
    <div class="col-75">
      <input type="email" id="email" name="email" placeholder="{{ $orcamento->email}}" disabled>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="telemovel">Telefone</label>
    </div>
    <div class="col-75">
      <input type="text" maxlength="9" id="telemovel" name="telemovel" placeholder="{{ $orcamento->telemovel}}" disabled>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Morada</label>
    </div>
    <div class="col-75">
      <input type="text" id="morada" name="morada" placeholder="{{ $orcamento->morada}}" disabled>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Código-Postal</label>
    </div>
    <div class="col-75">
      <input type="text" id="codpost" name="codpost" placeholder="{{ $orcamento->codpost}}" style="width: 200px;" disabled>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Observações</label>
    </div>
    <div class="col-75">
      <textarea id="mensagem" name="mensagem" placeholder="{{ $orcamento->mensagem}}" style="height:200px" disabled></textarea>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Resposta</label>
    </div>
    <div class="col-75">
      <textarea id="resposta" name="resposta" placeholder="Escreva a sua resposta..." style="height:200px" required></textarea>
    </div>
  </div>
  <div class="row" style="margin-top: 10px;">
    <input type="submit" value="Submeter" >
  </div> 
  </form>
</div>

@endforeach





        <!--FOOTER-->
        <footer style="margin-top: 60px;">
            <div class="footer-content">
                <h2>ZAC Carpintaria</h2>
                <p style="font-style: italic;">50 anos a construir o futuro juntos</p>
                <ul class="socials">
                    <li><a href="https://www.facebook.com/zac.carpintaria"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/zac_carpintaria"><i class="fab fa-instagram"></i></li>
                    <li><a href="https://www.google.com/maps/place/Aldeia+Nova,+S%C3%A1t%C3%A3o/data=!4m2!3m1!1s0xd3cb0f7dfa9158d:0xa00ebc04f814790?sa=X&ved=2ahUKEwimxcbm7OPwAhXyBGMBHSEhD_8Q8gEwAHoECAMQAQ"><i class="fas fa-map-marked-alt"></i></a></li>
                    <li><a href="mailto: zaccarpintaria@gmail.com"><i class="fab fa-google-plus"></i></a></li>
                    <li><a href="tel:+351933228743"><i class="fas fa-phone"></i></i></a></li>
                </ul>
            </div>
            <div class="footer-bottom">
                <p>Copyright &copy;2021 ZAC Carpintaria. designed by <span>PDI</span></p>
            </div>
        </footer>




        <!-- botao -->
        <div class="botao">
  
          <div class="fab-container">
            <div class="fab fab-icon-holder" style="width: 60px;
            height: 60px;
            background: rgb(255, 135, 37);">
              <i style="font-size:25px; " class="fas fa-thumbtack"></i>
            </div>
        
            <ul class="fab-options">
              <li>
                <span class="fab-label">Facebook</span>
                <div class="fab-icon-holder">
                  <a href="https://www.facebook.com/zac.carpintaria" style="text-decoration:none;"><i class="fab fa-facebook"  style="color:rgb(255, 135, 37);"></i></a>
                </div>
              </li>
              <li>
                <span class="fab-label">Instagram</span>
                <div class="fab-icon-holder" >
                  <a href="https://www.instagram.com/zac_carpintaria/" style="text-decoration:none;"><i class="fab fa-instagram" style="color:rgb(255, 135, 37);"></i></a>
                </div>
              </li>
              <li>
                <span class="fab-label">Chat (Brevemente)</span>
                <div class="fab-icon-holder">
                  <a href="/chatify" style="text-decoration:none;"><i class="fas fa-comment"  style="color:rgb(255, 135, 37);"></i></a>
                </div>
              </li>
              <li >
                <span class="fab-label">ZAC</span>
                <div class="fab-icon-holder">
                  <a href="/index" style="text-decoration:none;"><i class="fas fa-home"  style="color:rgb(255, 135, 37);"></i></a>
                </div>
              </li>
            </ul>
          </div>
        </div>  
        







</body>
</html>