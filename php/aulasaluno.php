<?php

    require("php/sessao.php");

    function AULAS_ALUNO(){
        require("php/conexao.php");

        
        $codcurso = $_SESSION["codcurso"]; //Obtido do arquivo de sessão
        $ra = $_SESSION["matricula"]; //Obtido do arquivo de sessão

        $InstrucaoSQL = "SELECT CODAULA, NOMEAULA, LINKAULA, NOMECURSO, A.DTCADASTRO, ANOTACOES FROM AULA A, CURSO B WHERE A.CODCURSO = B.CODCURSO AND A.CODCURSO = $codcurso ORDER BY A.CODAULA DESC;";
        $LinkMeetSQL = "SELECT CODCURSO, NOMECURSO, LINKMEET FROM CURSO WHERE CODCURSO = $codcurso";
        $NotaAlunoSQL = "SELECT NOTA FROM ALUNOS WHERE RA = $ra";

        $resultado = mysqli_query($conn,$InstrucaoSQL);
        $LinkMeet = mysqli_query($conn,$LinkMeetSQL);
        $resultNotaAluno = mysqli_query($conn,$NotaAlunoSQL);

        while ($linha = mysqli_fetch_assoc($resultNotaAluno)){
            $rNotaAluno = "{$linha['NOTA']}";
        };

        $rLINKMEET = "";

        while ($linha = mysqli_fetch_assoc($LinkMeet)){
            $rLINKMEET = "{$linha['LINKMEET']}";
            $rCODCURSO = "{$linha['CODCURSO']}";
            $rNOMECURSO = "{$linha['NOMECURSO']}";
        };

        echo "<table class=\"table table-striped\">
        <tbody>
            <tr>
            <td style=\"width:130px\"><b>Assista a aula telepresencial: </td>
            <td style=\"width:100px\"> <a class=\"btnbusca btn\" href=\"$rLINKMEET\" target=\"_blank\"><b>Link Google Meet</b></a></td>
            <td style=\"width:300px\"><b>Seu curso é: $rCODCURSO - $rNOMECURSO</td>
            <td style=\"width:300px\"><b>Sua nota é: $rNotaAluno</td>
        </tbody>
        </table>";

        while ($linha = mysqli_fetch_assoc($resultado)){
            $CODAULA = "{$linha['CODAULA']}";
            $NOMEAULA = "{$linha['NOMEAULA']}";
            $LINKAULA = "{$linha['LINKAULA']}";
            $NOMECURSO = "{$linha['NOMECURSO']}";
            $DTCADASTRO = "{$linha['DTCADASTRO']}";
            $ANOTACOES = "{$linha['ANOTACOES']}";

            echo "<table class=\"table table-striped\">
            <tr>
                <th scope=\"col\" width=\"25\"></th>
                <th scope=\"col\" width=\"560\">Nº Aula: $CODAULA - $NOMEAULA</th>
                <th scope=\"col\" width=\"900\">Anotações do Professor</th>
            </tr>
            <tbody>
                <td></td>
                <td>$LINKAULA</td>
                <td><textarea class=\"form-control\" readonly style=\"width: 560px; height: 300px;\">$ANOTACOES</textarea></td>
            </tbody>
            </table>";
        };

        mysqli_close($conn);

    };

    function NOMEALUNO(){
        require("php/conexao.php");

        $ra = $_SESSION["matricula"]; //Obtido do arquivo de sessão

        $NomeAlunoSQL = "SELECT NOME FROM ALUNOS WHERE RA = $ra";

        $resultNomeAluno = mysqli_query($conn,$NomeAlunoSQL);

        while ($linha = mysqli_fetch_assoc($resultNomeAluno)){
            $NomeAluno = "{$linha['NOME']}";
            return $NomeAluno;
        };

        mysqli_close($conn);
    };

    function RAALUNO(){
        require("php/conexao.php");

        $ra = $_SESSION["matricula"]; //Obtido do arquivo de sessão

        return $ra;

        mysqli_close($conn);
    };
?>