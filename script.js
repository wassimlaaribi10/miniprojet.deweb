function showMatches() {

    var matches = document.querySelectorAll('.comp');

    matches.forEach(function(match) {
        match.style.transition ='0.2s';
        if (match.style.opacity === '0') {
        match.style.opacity ='1';
        }
        else {
            match.style.opacity ='0';
          }
    });
  }

  function showReservation() {

    var reserve = document.querySelectorAll('.reserveticket');
    
    reserve.forEach(function(rese) {
        rese.style.transition ='0.4s';
        if(rese.style.opacity === '0'){
            rese.style.opacity='1';
        }
        else
            rese.style.opacity='0';
  });
}