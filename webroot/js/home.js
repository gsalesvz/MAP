/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    var pesquisaDefault = "Pesquise...";
    var delayPesquisa;
    
    $("#search").val(pesquisaDefault);

    $("#search").focusin(function() {
        if ($(this).val() == pesquisaDefault)
            $(this).val("").removeClass("idle");
    });

    $("#search").focusout(function() {
        if ($(this).val().length == 0) 
            $(this).val(pesquisaDefault).addClass("idle");
    });

    $("#search").keypress(function() {
        clearTimeout(delayPesquisa);
        
        delayPesquisa = setTimeout(function() {
            if ($("#search").val() != pesquisaDefault && $("#search").val().length > 0)
                alert($("#search").val());
        }, 800);
    });
    
    $("nav.explore ul li").click(function() {
        var classeAtual = $("nav.explore ul li.selected").attr("class");
        classeAtual = classeAtual.replace("selected", "").trim();

        $("nav.explore ul li").removeClass("selected");
        var classeNova = $(this).attr("class");
        $(this).addClass("selected");

        $("ul[class*='" + classeAtual + "']").fadeOut(250, function() {
            $("ul[class*='" + classeNova + "']").fadeIn(250);
        });

    });
});