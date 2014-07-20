(function() {
  var SE;

  SE = (function() {
    SE.prototype.loaded_at = Date.now();

    function SE() {
      console.log("loaded");
    }

    return SE;

  })();

  $(document).ready(function() {
    return window.ScriptEd = window.ScriptEd || new SE();
  });

}).call(this);
