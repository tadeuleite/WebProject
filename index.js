function Redirecionar() {
    var selectCrud = document.getElementById("selectCrud");
    var selectAreas = document.getElementById("selectAreas");
    
    var valorSelecionadoCrud = selectCrud.options[selectCrud.selectedIndex].value;
    var valorSelecionadoAreas = selectAreas.options[selectAreas.selectedIndex].value;

    var linkUrl = valorSelecionadoCrud + valorSelecionadoAreas;

    
    $('.carousel').carousel({
        interval: 20
    })
    
    document.getElementById("redirecionar").href = valorSelecionadoCrud + "/" + linkUrl + ".php";
}
