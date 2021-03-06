
<!-- multistep form -->

<form id="msform" action="processarCadastro.php" method="post" class="form-group" >
	<!-- progressbar -->
	<ul id="progressbar">
		<li class="active">Configuraçôes da conta.</li>
		<li>Setores</li>
		<li>Detalhes opcionais</li>
	</ul>
	<!-- fieldsets -->
	<fieldset>
		<h2 class="fs-title">Crie a conta da empresa</h2>
		<h3 class="fs-subtitle">Essa é a etapa 1</h3>
		<input type="text" name="email" placeholder="Email" required/>
		<input type="text" name="username" placeholder="Nome da empresa" required/>
		<input type="password" name="password" placeholder="Senha" required/>
		<input type="password" name="passwordcheck" placeholder="Confirmar senha" required/>
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Setores</h2>
		<h3 class="fs-subtitle">Insira o nome de cada setor</h3>
		<input type="text" name="setor1" placeholder="setor 1" required/>
		<div id="sector"></div>
		<script>var countSector = 1;</script>
		<input type="button" name="addSector" value="Adicionar mais setores" onclick="myFunction()"/>
		<script>
		function myFunction() {
		countSector++;
		document.getElementById("sector").innerHTML += "<input type='text' name='setor"+ countSector +"' placeholder='setor "+ countSector +"' required/>";
		document.getElementById("countSector").innerHTML = "<input type='hidden' name='countSector' value='"+ countSector +"'/>";
}		
		</script>
		<div id="countSector"><input type='hidden' name='countSector' value='1'/></div>
		
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
		
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Detalhes Opcionais</h2>
		<h3 class="fs-subtitle">Preencha se achar nescessário</h3>
		<textarea type="" name="desc" placeholder="Descrição da empresa" form="msform"></textarea>
		<input type="text" name="CEO" placeholder="CEO" />
		<input type="text" name="telefone" placeholder="Telefone" data-inputmask="'mask' : '(999) 9999-9999'" />
		<input type="text" name="cnpj" placeholder="cnpj" data-inputmask="'mask' : '99.999.999/9999-99'" />
		<textarea name="address" placeholder="Endereço" form="msform"></textarea>
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="submit" name="submit" class="btn btn-default" value="Submit" />
	</fieldset>
</form>

	<!--
        <form action="processarCadastro.php" method="post" class="form-group" >
            <h2>Cadastrar usuario</h2>
            nome: <input type="text" name="username" id="username" class="form-control" required/><br/>
            cnpj: <input type="text" name="cnpj" id="cnpj" class="form-control" required/><br/>
            senha: <input type="password" name="password" id="password" class="form-control" required/><br/>
            telefone: <input type="tel" name="telefone" id="telefone" class="form-control" required/><br/>
            email: <input type="email" name="email" id="email" class="form-control" required/><br/>
            site: <input type="url" name="site" id="site" class="form-control" required/><br/>
            <input type="submit" class="btn btn-default"/>
        </form>
		-->
		
<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

<script>
		//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})

		</script>
		
	<!-- jquery.inputmask -->
    <script src="vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
	 <!-- jquery.inputmask -->
    <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>
    <!-- /jquery.inputmask -->
    </body>
</html>