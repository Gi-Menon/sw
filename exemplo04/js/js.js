function abrirModal(id) {
    document.getElementById("idExcluir").value = id;
    document.getElementById("modalExcluir").style.display = "flex";
  }
  function fecharModal() {
    document.getElementById("modalExcluir").style.display = "none";
}