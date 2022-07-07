
function Registrar() {
  var task = "registrar";
  var selec = document.getElementsByClassName('registrarr');
  for (let i = 0; i < selec.length; i++) {
    // console.log(selec[i].value);
    if (selec[i].value === '') {
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: `Falta  llenar campos, por favor Ingrese todos los campos`,
      })
      return;
    }
  }
  let Nombre = document.getElementById("Nombre").value;
  let Referencia = document.getElementById("Referencia").value;
  let Precio = document.getElementById("Precio").value;
  let Peso = document.getElementById("Peso").value;
  let Categoria = document.getElementById("Categoria").value;
  let Stock = document.getElementById("Stock").value;
  // 
  Swal.fire({
    title: 'Esta Seguro?',
    text: "¡No podrás revertir esto!",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, Registrar!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        method: "POST",
        url: "../../Controladores/productos/Productos.controller.php",
        data: { Nombre, Referencia, Precio, Peso, Categoria, Stock, task }
      }).done(function (data) {
        let timerInterval
        Swal.fire({
          icon: 'success',
          title: 'Registrado!',
          html: 'Producto registrado exitosamente.',
          timer: 3000,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
              b.textContent = Swal.getTimerLeft()
            }, 100)
          },
          willClose: () => {
            clearInterval(timerInterval)
            window.location.href = "../../Vistas/productos/Productos.php";
            var tabla = document.getElementsByClassName('table vm no-th-brd pro-of-month')
            console.log(tabla);
          }
        }).then((result) => {
          /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
          }
        })
      }).fail(function () {
        alert("Algo salió mal");
      });
    }
  })
}


function EditarInformacion(ID) {
  var task = "ConsultaIndividual";
  $.ajax({
    method: "POST",
    url: "../../Controladores/productos/productos.controller.php",
    data: { task, ID }
  }).done(function (data) {
    var datos = JSON.parse(data);
    document.getElementById("EID").value = datos[0].ID;
    document.getElementById("EditNombre").value = datos[0].Nombreproducto;
    document.getElementById("EditReferencia").value = datos[0].Referencia;
    document.getElementById("EditPrecio").value = datos[0].Precio;
    document.getElementById("EditPeso").value = datos[0].Peso;
    document.getElementById("EditCategoria").value = datos[0].Categoria;
    document.getElementById("EditStock").value = datos[0].Stock;
    $('#EditarInformacion').modal('show');
  }).fail(function () {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'Error, comuniquese con el administrador',
    })
  });

  // $('#EditarInformacion').modal('hide');
}

function EditarInformacionBD() {

  let EID = document.getElementById("EID").value;
  let Enombre = document.getElementById("EditNombre").value;
  let EReferencia = document.getElementById("EditReferencia").value;
  let EPrecio = document.getElementById("EditPrecio").value;
  let EPeso = document.getElementById("EditPeso").value;
  let ECategoria = document.getElementById("EditCategoria").value;
  let EStock = document.getElementById("EditStock").value;
  var task = "EditarInformacion";

  $.ajax({
    method: "POST",
    url: "../../Controladores/productos/Productos.controller.php",
    data: {
      task, Enombre, EReferencia, EPrecio, EPeso,
      ECategoria, EStock, EID
    }
  }).done(function (data) {
    if (data > 0) {
      let timerInterval
      Swal.fire({
        icon: 'success',
        title: 'Actualizado!',
        html: 'Usuario Actualizado exitosamente',
        timer: 3000,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector('b')
          timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
          }, 100)
        },
        willClose: () => {
          clearInterval(timerInterval)
          window.location.href = "../../Vistas/productos/Productos.php";
          var tabla = document.getElementsByClassName('table vm no-th-brd pro-of-month')
          console.log(tabla);
        }
      }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
          console.log('I was closed by the timer')
        }
      })
    }
  }).fail(function () {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'Error, comuniquese con el administrador',
    })
  });
}


function EliminarInformacion(producto) {

  $('#Eliminar').modal('show'); // abrir
  // $('#Eliminar').modal('hide');
  var input = document.getElementById('Eliminarnombre')
  var res = producto.split("-");
  input.innerHTML = res[1];
  document.getElementById('Eliminarid').value = res[0];
}

function EliminarInformacionBD() {
  let id = document.getElementById('Eliminarid').value;
  var task = "Eliminar";
  Swal.fire({
    title: 'Esta Seguro?',
    text: "¡No podrás revertir esto!",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, Eliminar!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        method: "POST",
        url: "../../Controladores/productos/Productos.controller.php",
        data: { id, task }
      }).done(function (data) {
        let timerInterval
        Swal.fire({
          icon: 'success',
          title: 'Registrado!',
          html: 'Producto eliminado  exitosamente.',
          timer: 3000,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
              b.textContent = Swal.getTimerLeft()
            }, 100)
          },
          willClose: () => {
            clearInterval(timerInterval)
            window.location.href = "../../Vistas/productos/Productos.php";
            var tabla = document.getElementsByClassName('table vm no-th-brd pro-of-month')
            console.log(tabla);
          }
        }).then((result) => {
          /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
          }
        })
      }).fail(function () {
        alert("Algo salió mal");
      });
    }
  })

}



function Cerrarmodal() {
  $('#Eliminar').modal('hide');
}

function Cerrarmodal1() {
  $('#addnew').modal('hide');
}

function Registrarcliente() {
  var task = "registrarc";
  var selec = document.getElementsByClassName('registrarc');
  for (let i = 0; i < selec.length; i++) {
    // console.log(selec[i].value);
    if (selec[i].value === '') {
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: `Falta llenar campos, por favor Ingrese todos los campos`,
      })
      return;
    }
  }
  let Nombre = document.getElementById("Nombrec").value;
  let Apellido = document.getElementById("Apellidoc").value;
  let Cedula = document.getElementById("Cedulac").value;
  // 
  Swal.fire({
    title: 'Esta Seguro?',
    text: "¡No podrás revertir esto!",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, Registrar!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        method: "POST",
        url: "../../Controladores/Clientes/clientes.controller.php",
        data: { Nombre, Apellido, Cedula, task }
      }).done(function (data) {
        let timerInterval
        Swal.fire({
          icon: 'success',
          title: 'Registrado!',
          html: 'Evaluacion registrada exitosamente.',
          timer: 3000,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
              b.textContent = Swal.getTimerLeft()
            }, 100)
          },
          willClose: () => {
            clearInterval(timerInterval)
            window.location.href = "../../Vistas/Clientes/clientes.php";
            var tabla = document.getElementsByClassName('table vm no-th-brd pro-of-month')
            console.log(tabla);
          }
        }).then((result) => {
          /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
          }
        })
      }).fail(function () {
        alert("Algo salió mal");
      });
    }
  })
}

function Editarcliente(Idcliente) {
  var task = "Consulta";
  $.ajax({
    method: "POST",
    url: "../../Controladores/Clientes/clientes.controller.php",
    data: { task, Idcliente }
  }).done(function (data) {
    var datos = JSON.parse(data);
    document.getElementById("ENombrec").value = datos[0].NombreCliente;
    document.getElementById("EApellidoc").value = datos[0].ApellidoCliente;
    document.getElementById("ECedulac").value = datos[0].Cedula;
    document.getElementById("ECedulaco").value = datos[0].Cedula;
    $('#Editarcliente').modal('show');
  }).fail(function () {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'Error, comuniquese con el administrador',
    })
  });

  // $('#EditarInformacion').modal('hide');
}

function EditarclienteBD() {
  let eNombre = document.getElementById("ENombrec").value;
  let eApellido = document.getElementById("EApellidoc").value;
  let eCedula = document.getElementById("ECedulac").value;
  let eCedula2 = document.getElementById("ECedulaco").value;
  var task = "Editar";
  $.ajax({
    method: "POST",
    url: "../../Controladores/Clientes/clientes.controller.php",
    data: {
      eNombre, eApellido, eCedula, eCedula2, task
    }
  }).done(function (data) {
    if (data > 0) {
      let timerInterval
      Swal.fire({
        icon: 'success',
        title: 'Actualizado!',
        html: 'Usuario Actualizado exitosamente',
        timer: 1000,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector('b')
          timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
          }, 100)
        },
        willClose: () => {
          clearInterval(timerInterval)
          window.location.href = "../../Vistas/Clientes/clientes.php";
          var tabla = document.getElementsByClassName('table vm no-th-brd pro-of-month')
          console.log(tabla);
        }
      }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
          console.log('I was closed by the timer')
        }
      })
    }
  }).fail(function () {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'Error, comuniquese con el administrador',
    })
  });
}

function Cerrarmodalc() {
  $('#Editarcliente').modal('hide');
}

function Cerrarmodalc1() {
  $('#addnew2').modal('hide');
}


function AgregarReserva() {
  let idproducto = document.getElementById("selectproducto").value;
  let cantidad = document.getElementById("Cantidad").value;
  var task = "ventas";
  Swal.fire({
    title: 'Esta Seguro?',
    text: "¡No podrás Reservar este vehiculo!",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, Registrar!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        method: "POST",
        url: "../../Controladores/Ventas/Ventas.controller.php",
        data: { idproducto, cantidad, task }
      }).done(function (data) {
        console.log(data);
        if (data == 'sinstock') {
          // alert('sin stock');
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Sin stock o cantidad mayor al stock!',
          });
        } else {
          let timerInterval
          Swal.fire({
            icon: 'success',
            title: 'Registrado!',
            html: 'Evaluacion registrada exitosamente.',
            timer: 2000,
            timerProgressBar: true,
            didOpen: () => {
              Swal.showLoading()
              const b = Swal.getHtmlContainer().querySelector('b')
              timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
              }, 100)
            },
            willClose: () => {
              clearInterval(timerInterval)
              // window.location.href = "../../Vistas/Venta/Venta.php";
              var tabla = document.getElementsByClassName('table vm no-th-brd pro-of-month')
              console.log(tabla);
            }
          }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
              console.log('I was closed by the timer')
            }
          })
        }

      }).fail(function () {
        alert("Algo salió mal");
      });
    }
  })
}







