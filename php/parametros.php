<?php
    
    function COR_SITE_HEXADECIMAL(){
        require("php/conexao.php");

        $InstrucaoSQL = "SELECT VALOR, ATIVO, VALORPADRAO FROM PARAMETROS WHERE ID = 2;";

        $resultado = mysqli_query($conn,$InstrucaoSQL);

        while ($linha = mysqli_fetch_assoc($resultado)){
            $ativo = $linha['ATIVO'];
            $valorparametro = "{$linha['VALOR']}";
            $valorpadrao = "{$linha['VALORPADRAO']}";

            if($ativo == 1){
                return $valorparametro;
            }else{
                return $valorpadrao;
            };
        };

        mysqli_close($conn);

    };

    function COR_CABECALHO_HEXADECIMAL(){
        require("php/conexao.php");

        $InstrucaoSQL = "SELECT VALOR, ATIVO, VALORPADRAO FROM PARAMETROS WHERE ID = 1";

        $resultado = mysqli_query($conn,$InstrucaoSQL);

        while ($linha = mysqli_fetch_assoc($resultado)){
            $ativo = "{$linha['ATIVO']}";
            $valorparametro = "{$linha['VALOR']}";
            $valorpadrao = "{$linha['VALORPADRAO']}";

            if($ativo == 1){
                return $valorparametro;
            }else{
                return $valorpadrao;
            };
            
        };

        mysqli_close($conn);

    };

    function EXIBE_INFO_SOBRE_ESCOLA(){
        require("php/conexao.php");

        $InstrucaoSQL = "SELECT ATIVO FROM PARAMETROS WHERE ID = 3;";
        $InstrucaoSQLParag1 = "SELECT VALOR FROM PARAMETROS WHERE ID = 5;";
        $InstrucaoSQLParag2 = "SELECT VALOR FROM PARAMETROS WHERE ID = 6;";

        $resultado = mysqli_query($conn,$InstrucaoSQL);
        $parag1 = mysqli_query($conn,$InstrucaoSQLParag1);
        $parag2 = mysqli_query($conn,$InstrucaoSQLParag2);

        while ($linha = mysqli_fetch_assoc($parag1)){
            $Paragrafo1 = "{$linha['VALOR']}";
        };

        while ($linha = mysqli_fetch_assoc($parag2)){
            $Paragrafo2 = "{$linha['VALOR']}";
        };

        while ($linha = mysqli_fetch_assoc($resultado)){
            $valorparametro = "{$linha['ATIVO']}";
            
            if ($valorparametro == 1){
                echo "<section class=\"page-section bg-primary text-white mb-0\" id=\"sobre\">
                    <div class=\"container\">
                        <!-- sobre Section Heading-->
                        <h2 class=\"page-section-heading text-center text-uppercase text-white\">Sobre a Escola Learn Tech</h2>
                        <!-- Icon Divider-->
                        <div class=\"divider-custom divider-light\">
                            <div class=\"divider-custom-line\"></div>
                            <div class=\"divider-custom-icon\"><i class=\"fas fa-star\"></i></div>
                            <div class=\"divider-custom-line\"></div>
                        </div>
                        <!-- sobre Section Content-->
                        <div class=\"row\">
                            <div class=\"col-lg-4 ml-auto\"><p class=\"lead\">$Paragrafo1</p></div>
                            <div class=\"col-lg-4 mr-auto\"><p class=\"lead\">$Paragrafo2</p></div>
                        </div>
                        <!-- sobre Section Button-->
                        <div class=\"text-center mt-4\">
                        <a href=\"cadastro.php\"><button class=\"buttonCad queroCadastrar\">Quero ser aluno!</button></a>
                        </div>
                    </div>
                </section>";

            }else{
                echo "";
            };
        };

        mysqli_close($conn);
        
    };

    function EXIBE_MENSAGEM_PARA_NOS(){
        require("php/conexao.php");

        $InstrucaoSQL = "SELECT ATIVO FROM PARAMETROS WHERE ID = 4;";

        $resultado = mysqli_query($conn,$InstrucaoSQL);

        while ($linha = mysqli_fetch_assoc($resultado)){
            $valorparametro = "{$linha['ATIVO']}";
            
            if ($valorparametro == 1){
                echo "<section class=\"page-section\" id=\"Contato\">
                <div class=\"container\">
                    <!-- Contato Section Heading-->
                    <h2 class=\"page-section-heading text-center text-uppercase text-secondary mb-0\">Enviar uma mensagem para nós</h2>
                    <!-- Icon Divider-->
                    <div class=\"divider-custom\">
                        <div class=\"divider-custom-line\"></div>
                        <div class=\"divider-custom-icon\"><i class=\"fas fa-star\"></i></div>
                        <div class=\"divider-custom-line\"></div>
                    </div>
                    <!-- Contato Section Form-->
                    <div class=\"row\">
                        <div class=\"col-lg-8 mx-auto\">
                            <!-- To configure the Contato form email address, go to mail/Contato_me.php and update the email address in the PHP file on line 19.-->
                            <form id=\"ContatoForm\" name=\"sentMessage\" novalidate=\"novalidate\">
                                <div class=\"control-group\">
                                    <div class=\"form-group floating-label-form-group controls mb-0 pb-2\">
                                        <label>Meu Nome</label>
                                        <input class=\"form-control\" id=\"name\" type=\"text\" placeholder=\"Nome\" required=\"required\" data-validation-required-message=\"Please enter your name.\" />
                                        <p class=\"help-block text-danger\"></p>
                                    </div>
                                </div>
                                <div class=\"control-group\">
                                    <div class=\"form-group floating-label-form-group controls mb-0 pb-2\">
                                        <label>Endereço de Email</label>
                                        <input class=\"form-control\" id=\"email\" type=\"email\" placeholder=\"Endereço de Email\" required=\"required\" data-validation-required-message=\"Please enter your email address.\" />
                                        <p class=\"help-block text-danger\"></p>
                                    </div>
                                </div>
                                <div class=\"control-group\">
                                    <div class=\"form-group floating-label-form-group controls mb-0 pb-2\">
                                        <label>Número de Telefone</label>
                                        <input class=\"form-control\" id=\"phone\" type=\"tel\" placeholder=\"Número de Telefone\" required=\"required\" data-validation-required-message=\"Please enter your phone number.\" />
                                        <p class=\"help-block text-danger\"></p>
                                    </div>
                                </div>
                                <div class=\"control-group\">
                                    <div class=\"form-group floating-label-form-group controls mb-0 pb-2\">
                                        <label>Mensagem:</label>
                                        <textarea class=\"form-control\" id=\"message\" rows=\"5\" placeholder=\"Digite aqui sua mensagem para nós\" required=\"required\" data-validation-required-message=\"Please enter a message.\"></textarea>
                                        <p class=\"help-block text-danger\"></p>
                                    </div>
                                </div>
                                <br />
                                <div id=\"success\"></div>
                                <div class=\"form-group\"><button class=\"btn btn-primary btn-xl\" id=\"sendMessageButton\" value=\"TESTETESTE\" type=\"submit\">Enviar</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>";

            }else{
                echo "";
            };
        };

        mysqli_close($conn);

    };

    function ENDERECO_ONDE_ESTAMOS(){
        require("php/conexao.php");
        
        $InstrucaoSQL = "SELECT VALOR FROM PARAMETROS WHERE ID = 7 AND ATIVO = 1;";

        $resultado = mysqli_query($conn,$InstrucaoSQL);

        $valorparametro = " ";

        while ($linha = mysqli_fetch_assoc($resultado)){
            $valorparametro = "{$linha['VALOR']}";
        };

        echo $valorparametro;

        mysqli_close($conn);

    };

    function LINK_REDES_SOCIAIS_FACEBOOK(){
        require("php/conexao.php");
        
        $InstrucaoSQL = "SELECT VALOR FROM PARAMETROS WHERE ID = 8;";

        $resultado = mysqli_query($conn,$InstrucaoSQL);

        while ($linha = mysqli_fetch_assoc($resultado)){
            $valorparametro = "{$linha['VALOR']}";
        };

        echo $valorparametro;

        mysqli_close($conn);

    };

    function LINK_REDES_SOCIAIS_TWITTER(){
        require("php/conexao.php");
        
        $InstrucaoSQL = "SELECT VALOR FROM PARAMETROS WHERE ID = 9;";

        $resultado = mysqli_query($conn,$InstrucaoSQL);

        while ($linha = mysqli_fetch_assoc($resultado)){
            $valorparametro = "{$linha['VALOR']}";
        };

        echo $valorparametro;

        mysqli_close($conn);

    };

    function LINK_REDES_SOCIAIS_LINKEDIN(){
        require("php/conexao.php");
        
        $InstrucaoSQL = "SELECT VALOR FROM PARAMETROS WHERE ID = 10;";

        $resultado = mysqli_query($conn,$InstrucaoSQL);

        while ($linha = mysqli_fetch_assoc($resultado)){
            $valorparametro = "{$linha['VALOR']}";
        };

        echo $valorparametro;

        mysqli_close($conn);

    };

    function PROJETO_CRIADO_POR(){
        require("php/conexao.php");

        $valorTitulo = "";
        $valorDescricao = "";

        $InstrucaoSQL = "SELECT ATIVO FROM PARAMETROS WHERE ID = 11;";
        $SQLTitulo = "SELECT VALOR FROM PARAMETROS WHERE ID = 12 AND ATIVO = 1";
        $SQLValor = "SELECT VALOR FROM PARAMETROS WHERE ID = 13 AND ATIVO = 1";

        $resultado = mysqli_query($conn,$InstrucaoSQL);
        $Titulo = mysqli_query($conn,$SQLTitulo);
        $Descricao = mysqli_query($conn,$SQLValor);

        while ($linha = mysqli_fetch_assoc($resultado)){
            $valorparametro = "{$linha['ATIVO']}";
        };

        while ($linha = mysqli_fetch_assoc($Titulo)){
            $valorTitulo = "{$linha['VALOR']}";
        };

        while ($linha = mysqli_fetch_assoc($Descricao)){
            $valorDescricao = "{$linha['VALOR']}";
        };


        if ($valorparametro == 1){
            echo "<div class=\"col-lg-4\">
                    <h4 class=\"text-uppercase mb-4\">$valorTitulo</h4>
                    <p class=\"lead mb-0\">
                        $valorDescricao
                    </p>
                </div>";
        }else{
            echo "";
        };

        mysqli_close($conn);

    };

    function IMAGEM_FUNDO_LOGIN(){
        require("php/conexao.php");

        $InstrucaoSQL = "SELECT VALOR, VALORPADRAO, ATIVO FROM PARAMETROS WHERE ID = 14;";

        $resultado = mysqli_query($conn,$InstrucaoSQL);

        while ($linha = mysqli_fetch_assoc($resultado)){
            $valor = "{$linha['VALOR']}";
            $ativo = "{$linha['ATIVO']}";
            $valorpadrao = "{$linha['VALORPADRAO']}";
        };

        if($ativo == 1){
            return $valor;
        }else{
            return $valorpadrao;
        };

        mysqli_close($conn);
    };

    function BARRA_NAVEGACAO_INDEX(){

        require("php/conexao.php");

        /*SOBRE A ESCOLA*/

        $InstrucaoSQL = "SELECT ATIVO FROM PARAMETROS WHERE ID = 3;";

        $resultExibeSobre = mysqli_query($conn,$InstrucaoSQL);

        while ($linha = mysqli_fetch_assoc($resultExibeSobre)){
            $ExibeSobre = "{$linha['ATIVO']}";
            
            if ($ExibeSobre == 1){
                echo $ExibeSobre = "<li class=\"nav-item mx-0 mx-lg-1\"><a class=\"nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger\" href=\"#sobre\">Sobre</a></li>";
            }else{
                echo $ExibeSobre = "";
            };
        };

        /*CONTATO -- MENSAGEM PARA NÓS*/

        $InstrucaoSQL = "SELECT ATIVO FROM PARAMETROS WHERE ID = 4;";

        $resultExibeContato = mysqli_query($conn,$InstrucaoSQL);

        while ($linha = mysqli_fetch_assoc($resultExibeContato)){
            $ExibeContato = "{$linha['ATIVO']}";
            
            if ($ExibeContato == 1){
                $ExibeContato = "<li class=\"nav-item mx-0 mx-lg-1\"><a class=\"nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger\" href=\"#Contato\">Contato</a></li>";
            }else{
                $ExibeContato = "";
            };

        };

        echo "<nav class=\"navbar navbar-expand-lg bg-secondary text-uppercase fixed-top\" id=\"mainNav\">
            <div class=\"container\">
                <a class=\"navbar-brand js-scroll-trigger\" href=\"#page-top\">ESCOLA Learn Tech</a>
                <button class=\"navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                    Menu
                    <i class=\"fas fa-bars\"></i>
                </button>
                <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
                    <ul class=\"navbar-nav ml-auto\">
                        <li class=\"nav-item mx-0 mx-lg-1\"><a class=\"nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger\" href=\"#Cursos\">Cursos</a></li>
                        $ExibeSobre
                        $ExibeContato
                        <!--<a href=\"login.php\" class=\"\" ><button class=\"buttonLogin loginCabecalho\"> <b>LOGIN<b> </button></a>-->
                        <a class=\"buttonLogin loginCabecalho\" href=\"login.php\"><button class=\"buttonLogin loginCabecalho\"><b>LOGIN</b></button></a>
                    </ul>
                </div>
            </div>
        </nav>";

        mysqli_close($conn);
    };

?>