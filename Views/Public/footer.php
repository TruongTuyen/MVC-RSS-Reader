<!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo MVC_BASE_URI; ?>/Views/Public/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo MVC_BASE_URI; ?>/Views/Public/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo MVC_BASE_URI; ?>/Views/Public/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo MVC_BASE_URI; ?>/Views/Public/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="<?php echo MVC_BASE_URI; ?>/Views/Public/validator/validator.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo MVC_BASE_URI; ?>/Views/Public/js/custom.min.js"></script>

    <!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });
      
      
    </script>
    <!-- /validator -->
  </body>
</html>