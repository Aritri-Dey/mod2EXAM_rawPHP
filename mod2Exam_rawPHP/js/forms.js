/**
 * Function to insert player data in the database using ajax.
 */
function insertPlayer() {
  var player = document.getElementById['playerName'];
  var runs = document.getElementById['runs'];
  var balls = document.getElementById['balls'];
  // Checking whether any field is empty, if not then only data will be inserted.
  if (!checkEmpty(player) || !checkEmpty(runs) || !checkEmpty(balls)) {
    return FALSE;
  }
  else {
    $.ajax({ 
      url : "insertData.php",
      type : "POST",
      data: $("#addPlayerForm").serialize(),
      success : function(data) {
        $("#response").html(data);
      }
    });
  }
}

/**
 * Function for checking whether any field is empty or not while adding player.
 * 
 *  @return bool
 *    TRUE or FLASE depending on condition satisfaction. 
 */
function checkEmpty(data) {
  if (data == NULL) {
    return FALSE;
  }
  return TRUE;
}

/**
 * Function to display the man of the match to anonymous user.
 */
function manOfTheMatch() {
  $.ajax({ 
    url : "showManMatch.php",
    type : "POST",
    success : function(data) {
      $("#manofthematch").html(data);
    }
  });
}

/**
 * Function to delete player data.
 */
function deletePlayer(id) {
  $.ajax({ 
    url : "delete.php",
    type : "POST",
    data : {
      id: id
    },
    success : function(data) {
      $("#response").html(data);
    }
  });
}
