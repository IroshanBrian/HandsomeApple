<?php
if (!empty($message)): ?>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
     <script>
          toastr.options = {
               "closeButton": true,
               "progressBar": true,
               "positionClass": "toast-top-right",
               "timeOut": "3000"
          };
          toastr.error("<?php echo htmlspecialchars($message); ?>");
     </script>
<?php endif; ?>