  //Prevents A new listing from being created upon submission
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}