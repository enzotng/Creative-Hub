// $(document).ready(function () {
//     $('#domaine').on('change', function () {
//         var domaine = $(this).val();

//         $.ajax({
//             url: "{{ route('projets.filtrer') }}",
//             method: 'get',
//             data: { domaine: domaine },
//             dataType: 'html',
//             success: function (response) {
//                 $('#projets-container').html(response);
//             },
//             error: function (jqXHR, textStatus, errorThrown) {
//                 console.log(textStatus, errorThrown);
//             }
//         });
//     });
// });