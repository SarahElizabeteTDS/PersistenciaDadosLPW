function validacao()
{
    var titulo = document.getElementById('titulo').value;
    var autor = document.getElementById('autor').value;
    var genero = document.getElementById('genero').value;
    var paginas = document.getElementById('qtd_paginas').value;

    var inputs = document.querySelectorAll('input');

    //alert(titulo + '-' + autor + '-' + genero + '-' + paginas);

    erros=[];

    if(titulo == '')
    {
        erros.push("Informe o titulo");
    }
    if(autor == '')
    {
        erros.push("Informe o autor");
    }
    if(genero == '' )
    {
        erros.push("Informe o genero");
    }
    if(paginas == '')
    {
        erros.push("Informe as paginas");
    }
    
    if(erros.length > 0)
    {
        //alert(erros.join("\n"));
        document.getElementById('divErro').innerHTML = erros.join("<br>");
        return false;
    }

    return true;
}