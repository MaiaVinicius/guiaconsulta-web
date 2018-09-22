<template>
    <div>
        <div class="header">
            <div class="container">

                <nav class="navbar navbar-expand-md navbar-transparent dark bg-dark">
                    <a class="navbar-brand" href="#"><img src="img/logo_full_white.png" class="mainLogo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                        <ul class="navbar-nav mr-auto">    <!---
         <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>-->
                        </ul>
                        <form class="form-inline my-2 my-lg-0">

                            <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Profissional da saúde? Clique
                                aqui!
                            </button>
                        </form>
                    </div>
                </nav>
            </div>
            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron">
                <div class="container">
                    <h2 class="display-4 text-center hWhite">Procurando atendimento perto de você?</h2>
                    <h5 class="text-center">Faça seu agendamento online:</h5>
                    <div class="row formHomeHolder">
                        <div class="col-md-3 whiteBg homeForm"></div>
                        <div class="col-md-3 whiteBg homeForm"></div>
                        <div class="col-md-3 whiteBg homeForm"></div>
                        <div class="col-md-2 homeForm">
                            <button type="submit" class="btn btn-block btn-success btn-full">Buscar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row p30">
                <div class="col-md-4 text-center boxed">
                    <img src="img/h1.png"/>
                    <h2 class="text-center p20">Encontre um profissional</h2>
                        <p class="text-left">Escolha entre milhares de Médicos, Dentistas e Profissionais de Saúde a
                            especialidade que você procura, sempre pertinho de você </p>

                </div>
                <div class="col-md-4 text-center boxed">
                    <img src="img/h2.png"/>
                    <h2 class="text-center p20">Você escolhe dia e horário</h2>
                        <p class="text-left">Todas as consultas tem hora marcada, e é você que escolhe o dia e a hora. O poder
                            está com você! </p>

                </div>
                <div class="col-md-4 text-center boxed">
                    <img src="img/h3.png"/>
                    <h2 class="text-center p20">Forma de Pagamento</h2>
                        <p class="text-left">Você está no comando, então escolha o profissional pelo plano de saúde ou valor da
                            consulta que você pode pagar. </p>

                </div>
            </div>

        </div>
        <div class="containder-fluid blueBg dark showApp">
            <div class="container p20">
                <div class="row ">

                    <div class="col-md-5">

                        <img src="img/app.png" class="floating"/>
                    </div>

                    <div class="col-md-7">

                        <h3 class="hWhite">O mesmo aplicativo apresenta a interface de busca de profissionais para o paciente, e
                            o gerenciamento de agenda e consultas para o profissional, tornando o processo mais transparente
                            para ambos.</h3>

                        <p>Você ganha mais um canal para seus pacientes te encontrarem e eles a comodidade de ótimos
                            especialistas na ponta dos dedos.</p>

                        <div class="row">
                            <div class="col-md-6 text-right">
                                <img src="img/gplay.png" class="dBtn">
                            </div>
                            <div class="col-md-6 text-left">
                                <img src="img/aplay.png" class="dBtn">
                            </div>

                        </div>

                    </div>

                </div>


            </div>

        </div>

        <div class="container p80 text-center">
            <div class="row">
                <div class="col-md-3">
                    <img src="img/sdoctor.png">
                </div>
                <div class="col-md-9">
                    <h3 class="mtop40"> Busque seu médico por localidade, proximidade, planos de saúde e especialidade, tudo
                        isso na palma da sua mão.</h3>

                    <p class="text-left mtop40">Transformamos a forma de relacionamento entre médico e paciente, trazendo a você
                        a facilidade que faltava e a seu medico a praticidade que ele buscava. Controle seus alarmes de
                        medicamentos, verifique as melhores drogarias para adquirir os itens da sua receita e ainda receba dicas
                        dos laboratórios mais perto de você que oferecem o exame que seu médico acabou de lhe prescrever. </p>
                    <a href="#" class="btn btn-outline-success mtop20"> É profissional da saúde? Clique aqui!</a>
                </div>
            </div>
        </div>

        <hr>

        <footer>

            <div class="container">
                <div class="row">

                    <div class="col-md-4">
                        <h3>Cidades</h3>
                        <ul>

                            <li><A href="#">Rio de Janeiro</A></li>
                            <li><A href="#">São Paulo</A></li>
                            <li><A href="#">Belo Horizonte</A></li>
                            <li><A href="#">Salvador</A></li>

                            <li><A href="#">Vitória</A></li>

                            <li><A href="#">Brasília</A></li>


                        </ul>

                    </div>
                    <div class="col-md-4">
                        <h3>Especialidades</h3>

                        <ul>
                            <li><A href="#">Ginecologista</A></li>
                            <li><A href="#">Dermatologista</A></li>
                            <li><A href="#">Ortopedista</A></li>
                            <li><A href="#">Oftalmologista</A></li>
                            <li><A href="#">Clínico Geral</A></li>
                            <li><A href="#">Cardiologista</A></li>
                            <li><A href="#">Dentista</A></li>
                            <li><A href="#">Nutricionista</A></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>Sobre Nós</h3>
                        <ul>
                            <li><A href="#"> O que é</A></li>
                            <li><A href="#">Dúvidas</A></li>
                            <li><A href="#">Termos de uso</A></li>
                            <li><A href="#">Política de privacidade</A></li>
                            <li><A href="#">Entre em contato</A></li>
                            <li><A href="#">Doutor Já para empresas</A></li>
                            <li><A href="#">Quer trabalhar conosco?</A></li>

                        </ul>

                    </div>
                </div>

            </div>
            <div class="container-flui mtop20 blueBg dark">
                <div class="container"><p>&copy; Company 2017</p></div>

            </div>
        </footer>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
