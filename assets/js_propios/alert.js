Swal
.fire({
title: 'Venta #123465',
text: '¿Eliminar?',
icon: 'warning',
showCancelButton: true,
confirmButtonText: 'Sí, eliminar',
cancelButtonText: 'Cancelar',
})
.then(resultado => {
if (resultado.value) {
// Hicieron click en 'Sí'
console.log('*se elimina la venta*');
} else {
// Dijeron que no
console.log('*NO se elimina la venta*');
}
});