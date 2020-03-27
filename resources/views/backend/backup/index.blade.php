@extends('layouts.backend')
@section('modal')
       <!-- MODAL DE CONFIRMACIÓN-->
    <div class="window" id="confirmDelete" style="display: none;">
      <span class="titleModal col100">Esta operación puede tardar varios minutos.<br/>¿Esta seguro de que desea realizarla?</span>
      <button id="closeModalWindowButton" class="closeModal" >
         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28">
            <polygon points="28,22.398 19.594,14 28,5.602 22.398,0 14,8.402 5.598,0 0,5.602 8.398,14 0,22.398 5.598,28 14,19.598 22.398,28"/>
         </svg>
      </button>
      <div class="confirmDeleteScene col100 xlMarginTop" style="margin-left: 3.8%">
         <button id="aceptDelete" class="delete">Aceptar</button>
         <button id="cancelDelete" >Cancelar</button>
      </div>
   </div>
@endsection
@section('content')
   <!-- TITULO -->
   <div id="title" class="col80 xlMarginBottom">
      <span>BACKUP</span>
   </div>

   <!-- CONTENIDO -->
   <div id="content" class="col100 backupIndex">
      <span class="col100 xlMarginBottom">Crea y restaura copias de seguridad de todo el sistema</span>

      <div class="col50 centerH">
         
            <div class="optionBackup col60">
                  <div id="downBackup">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 367.85 403.58">
                        <path d="M392.14,282.53v134.8l.23.1,26.46-26.8,50.42,50.07c-.35.37-.66.72-1,1L357.06,552.92c-.3.31-.8.81-1.07,1.14h0l-5.67-5.46c-37-37-69.65-69.5-106.64-106.46a9.19,9.19,0,0,0-1-.94c17-17,33.58-33.61,50.55-50.58l26.51,26.92.33-.19q0-67.32,0-134.82" transform="translate(-101.4 -150.5)"/><path d="M240.66,553.54c-4.82-.36-9.65-.63-14.46-1.09-5-.48-10-1-15-1.75-7.56-1.12-15.14-2.22-22.63-3.69-18.54-3.64-36.66-8.67-53.75-16.91a88.3,88.3,0,0,1-21.49-13.92c-4.37-4-8-8.47-10.21-14a24.4,24.4,0,0,1-1.62-8.86l0-80.79a.6.6,0,0,1,.15-.42c.11.32.22.65.31,1,1.55,5.6,4.78,10.17,8.79,14.24A76.75,76.75,0,0,0,129.81,441c12.08,6.44,24.91,10.91,38.06,14.51a279.9,279.9,0,0,0,33.51,7.08c7.3,1.07,14.62,2,22,2.81,7,.73,14.13,1.13,21.19,1.64a3,3,0,0,1,2.13.94Q287.3,508.6,328,549.22a4.59,4.59,0,0,0,1,.57l-.26.41c-1.61.22-3.21.49-4.82.67-5.34.61-10.67,1.26-16,1.75-5.11.46-10.25.73-15.37,1.1" transform="translate(-101.4 -150.5)"/><path d="M408.16,293.6v-1.37c0-3.29.06-6.59,0-9.88a15.68,15.68,0,0,0-3.89-10.19,16.11,16.11,0,0,0-12.82-5.71q-35.71,0-71.42,0a15.26,15.26,0,0,0-10.17,3.88,16.11,16.11,0,0,0-5.71,12.82q0,17.76,0,35.51v1.41c-1.52.13-2.94.27-4.38.37-12.71.87-25.45,1.29-38.19,1-8.57-.19-17.14-.51-25.69-1.07-7.47-.5-14.92-1.26-22.35-2.18C194,315.78,174.75,312,156,305.77c-11.14-3.69-21.95-8.15-31.95-14.38-6.51-4.07-12.5-8.75-17.07-15a27.35,27.35,0,0,1-5.53-16.69c.07-15.1.29-30.2-.07-45.29-.24-9.95,3.62-17.75,10.5-24.44,6-5.9,13.13-10.33,20.62-14.13,12-6.12,24.76-10.4,37.78-13.88a287.44,287.44,0,0,1,29.31-6.19c7.52-1.18,15.07-2.22,22.64-3s14.86-1.37,22.31-1.66q15.57-.6,31.15-.57c7.39,0,14.78.46,22.16.94,7,.45,14,1,21,1.86,21.79,2.55,43.25,6.7,64,13.9a141.37,141.37,0,0,1,28.8,13.3c6.08,3.8,11.7,8.14,16.19,13.8a25.87,25.87,0,0,1,6.43,17.28c0,16-.06,32,.05,48a27.55,27.55,0,0,1-5.59,16.88c-4.13,5.64-9.45,10-15.24,13.79C411.84,291.37,410.11,292.39,408.16,293.6Z" transform="translate(-101.4 -150.5)"/><path d="M101.44,295c2.53,8.9,8.42,15.17,15.41,20.59,8.54,6.62,18.15,11.28,28.13,15.25a223.13,223.13,0,0,0,35.48,10.65q11,2.37,22.12,4.18c6.55,1.06,13.16,1.84,19.77,2.51,7.35.74,14.71,1.46,22.09,1.73q16,.6,32,.48c8.19-.07,16.38-.65,24.57-1,1,0,2-.17,3.09-.26v29.79c-.74-.53-1.43-1.07-2.16-1.56a16.48,16.48,0,0,0-19.6,1.33q-1.69,1.51-3.3,3.1l-46.8,46.78a18.46,18.46,0,0,0-4.43,6.39,1,1,0,0,1-.81.48c-6.46-.74-13-1.32-19.38-2.33-8.74-1.37-17.48-2.86-26.13-4.69a211.64,211.64,0,0,1-41.55-13.05c-8.77-3.84-17.15-8.34-24.54-14.5-4.82-4-9-8.58-11.64-14.37A24.94,24.94,0,0,1,101.5,376l-.06-79.88Z" transform="translate(-101.4 -150.5)"/><path d="M434.29,295v1.17q0,40.33,0,80.68c0,1.78-.34,3.57-.52,5.36l-.32.1c-.28-.26-.57-.5-.83-.76a22.1,22.1,0,0,0-6.05-4.94c-6.32-3-12.37-2.5-18,1.7,0,0-.12.06-.28.15a7.58,7.58,0,0,1-.08-.76q0-27.07,0-54.15a1.35,1.35,0,0,1,.79-1.35,79,79,0,0,0,12.71-8.85C427.4,308.29,432.15,302.57,434.29,295Z" transform="translate(-101.4 -150.5)"/>
                     </svg>
                     <span>Descargar Copia</span>
                  </div>
            </div>
         
      </div>

      <div class="col50 centerH">
         <div class="optionBackup col60">
            <div id="upBackup">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 367.34 403.54">
                  <path d="M342.51,604.29c0-.4,0-.81,0-1.21V469.14l-26.7,27-50.29-49.93L378.79,332.9l113,113-50.34,50.36-26.6-27-.26.15c0,.31-.06.63-.06.94V603.38c0,.3,0,.91,0,.91Z" transform="translate(-124.41 -200.75)"/>
                  <path d="M268.26,604.29c-1.53-.13-3.07-.27-4.61-.38-4.82-.36-9.65-.63-14.46-1.09-5-.48-10-1-15-1.75-7.57-1.12-15.14-2.22-22.64-3.69-18.53-3.64-36.66-8.68-53.75-16.91a87.85,87.85,0,0,1-21.49-13.93c-4.44-4-8.16-8.62-10.31-14.34a24.46,24.46,0,0,1-1.5-8.67q0-40.2,0-80.4a1.19,1.19,0,0,1,.16-.7c.11.34.22.67.31,1,1.55,5.6,4.79,10.17,8.79,14.24a77.07,77.07,0,0,0,19.11,13.66c12,6.42,24.84,10.89,38,14.49a283.6,283.6,0,0,0,33.52,7.08c6.93,1,13.88,2,20.85,2.75,7.38.76,14.79,1.22,22.2,1.71,10.54.69,21.1.76,31.66.55,7.32-.14,14.63-.6,22-.93,1.78-.08,3.55-.22,5.44-.33,0,.39.06.74.06,1.1q0,42.21,0,84.42c0,1.05-.32,1.28-1.29,1.32-3.59.16-7.18.41-10.77.63a5,5,0,0,0-.77.17Z" transform="translate(-124.41 -200.75)"/><path d="M124.49,286.32c0-7.33.23-14.67,0-22-.35-9,3.07-16.32,9.12-22.66a73.63,73.63,0,0,1,17.7-13.22c11.21-6.28,23.18-10.69,35.46-14.32A275.41,275.41,0,0,1,219,206.72c7.47-1.26,15-2.36,22.51-3.21s14.91-1.36,22.38-1.91c11.64-.85,23.31-1,35-.75,7.35.14,14.71.48,22,1,7,.46,14,1,21,1.87,22.52,2.67,44.69,7,66.1,14.67,10.35,3.72,20.34,8.2,29.49,14.38a55.87,55.87,0,0,1,14.12,13,27.61,27.61,0,0,1,5.7,17c-.11,15.5-.17,31,0,46.5a29,29,0,0,1-7.14,19.57A63.12,63.12,0,0,1,432.59,343c-4.13,2.36-8.46,4.37-12.68,6.57a1.12,1.12,0,0,1-1.54-.33q-13.83-13.84-27.68-27.67a16.21,16.21,0,0,0-13.26-4.88,15.07,15.07,0,0,0-9.25,3.94c-.83.78-1.7,1.52-2.51,2.32q-23.73,23.72-47.43,47.43a2.7,2.7,0,0,1-1.95.84c-11.25.61-22.51.84-33.77.57-8.26-.2-16.52-.67-24.77-1.17-5.46-.34-10.91-.84-16.35-1.47-5.86-.67-11.74-1.37-17.54-2.43-8.93-1.62-17.86-3.35-26.7-5.43a192.3,192.3,0,0,1-36.7-12.42,96.54,96.54,0,0,1-22.61-13.83c-5-4.27-9.29-9.14-11.73-15.38a24.73,24.73,0,0,1-1.63-9.16Q124.51,298.42,124.49,286.32Z" transform="translate(-124.41 -200.75)"/><path d="M284,487.46c-2.09,0-4,.09-5.91,0-8-.42-16.05-.78-24-1.39-6.66-.51-13.31-1.19-19.93-2.08-20.64-2.75-41-6.94-60.61-14.05-10.76-3.9-21.13-8.6-30.54-15.21a51.9,51.9,0,0,1-13.82-13.54A26.71,26.71,0,0,1,124.47,426q0-39.28,0-78.57a8.17,8.17,0,0,1,.2-2.17c.09.28.19.56.26.85a33.17,33.17,0,0,0,8.8,14.35,77.11,77.11,0,0,0,19,13.64c12.21,6.54,25.2,11,38.52,14.69a281.26,281.26,0,0,0,30.64,6.59c7.79,1.22,15.61,2.29,23.45,3.08,8.68.87,17.4,1.43,26.12,2,5.09.31,10.21.3,15.32.43l.92,0c-.34.37-.57.62-.81.86l-32.31,32.31a16.53,16.53,0,0,0-5.07,13.52,14.14,14.14,0,0,0,3.75,9c6.7,6.83,13.49,13.58,20.26,20.35,3.24,3.23,6.5,6.44,9.74,9.66C283.44,486.87,283.66,487.12,284,487.46Z" transform="translate(-124.41 -200.75)"/><path d="M457.27,503.85v1.06c0,12.48-.1,24.95.08,37.43a28.29,28.29,0,0,1-6.54,18.57c-4.63,5.81-10.46,10.22-16.72,14.09-1,.64-2.08,1.23-3.12,1.84a1.89,1.89,0,0,1-.37.11V508.14a31.52,31.52,0,0,0,3.75,2.39c6.09,2.82,11.95,2.29,17.35-1.69a47.1,47.1,0,0,0,4.61-4.34,6.25,6.25,0,0,0,.65-.86Z" transform="translate(-124.41 -200.75)"/>
                  <path d="M457.25,387.87l-19.12-19.13c8.39-6,16.11-12.77,19.12-23.41Z" transform="translate(-124.41 -200.75)"/>
               </svg>
               <span>Subir Copia</span>
            </div>
         </div>   
      </div>

      {{-- Formulario para restauracion oculto --}}
      <form id="formRestore" method="POST" action={{route("backup.restore")}} style="display:none" enctype="multipart/form-data">
         @csrf
         <input id="fileInput" type="file" name="nombre">
         <input type="submit" name="cancel" value="Restaurar copia">
      </form>
   </div>

   <script>
      $( document ).ready(function() {
         //Accion para examinar imagen de restauracion al hacer clic sobre el elemento HTML
         $('#upBackup').on("click", function(){
            $('#fileInput').trigger('click');
         });
         //Enviar formulario al seleccionar un elemento
         $("#formRestore").on("change", function(){
            $("#formRestore").submit();
         });
      });

      $("#downBackup").click(function(){
         console.log("click");
         $("#modalWindow").css("display", "block");
         $("#containerModal").css("display", "block");
         $("#confirmDelete").css("display", "block");
            $("#aceptDelete").click(function(){
               $("#modalWindow").css("display", "none");
               $("#containerModal").css("display", 'none');
               $("#confirmDelete").css("display", "none");
               window.location.href="{{route('backup.create')}}"
            });
            $("#cancelDelete").click(function(){
               $("#modalWindow").css("display", "none");
               $("#containerModal").css("display", 'none');
               $("#confirmDelete").css("display", "none");
            }) 
         $("#closeModalWindowButton").click(function(){
            $("#modalWindow").css("display", "none");
            $("#containerModal").css("display", 'none');
            $("#confirmDelete").css("display", "none");
         });   
      });

   </script>
@endsection
