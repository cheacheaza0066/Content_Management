$(function() {

    setTimeout(showModel,1000);
    function showModel(){
        $('#Modalshow').modal('show');

    }
    
});

// $(function() {
//     setTimeout(showModel,1000);

//     function showModel(){
//         var is_already_show = sessionStorage.getItem('alreadyShow');
//         if(is_already_show != 'alredy shown'){
//             sessionStorage.setItem('alreadyShow','alredy shown');
//             $('#Modalshow').modal('show');
//         }else{
//             console.log('already Show');
//         }
    

//     }
    
// });

// show ครั้งเดียว
// $(function() {
//     if(sessionStorage.getItem('#Modalshow')!=='true'){
//         $('#Modalshow').modal('show');
//         sessionStorage.setItem('#Modalshow','true');
//     }else{
//                     console.log('already Show');
//                 }
// });

// window.onunload = function () {
//     Auth::logout();
// }