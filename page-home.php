<?php
/**
 * Template Name: P&aacute;gina Inicio
 * @package WordPress
 * @subpackage inusual
 * @since inusual 1.0
 */

get_header(); ?>

<div id="content" class="site-content">
	
	
    <div class="fullscreen-cover">
	    <div class="cover"></div>
	    <div id="container">
			<div class="row">
				<div class="column small-12 small-centered">
					<div id="main">
						<h2 class="subtext side-right">Proyectos en Colaboración</h2>
						<h1 class="entry-home ">Queremos mejorar el paisaje digital, diseñando la identidad de tu marca y comunicando tu proyecto.</h1>
						<img class="entry-img hide" src="<?php echo get_template_directory_uri(); ?>/images/imagotipo_claro.svg">
						<a class="button button-intro" href="">+</a>
						<h2 class="subtext side-left">Estudio Independiente</h2>
						
						<img class="img" src="<?php echo get_template_directory_uri(); ?>/images/assets/border.png">
					</div>
					
					
				
				</div>
				
			</div>
	    </div>
    </div>
    
    
    <div id="services" class="block">
	    <div class="row">
		    <div class="column medium-9 end">
		    	<h2>SERVICIOS</h2>
				<h1>ESPECIALIZADOS EN DISEÑO Y DESARROLLO WEB RESPONSIVE, PROYECTOS DIGITALES Y DISEÑO DE IDENTIDAD VISUAL.</h1>
		    </div>
	    </div>
		<div class="row">
		    <div class="column medium-offset-1 medium-3 col-1">
			    <h3>Planificación y Diseño</h3>
			    <ul class="list">
				     <li>Arquitectura de Información</li>
				     <li>Diseño de Interfaces</li>
				     <li>Diseño Web Responsive</li>
				     <li>Diseño de Interacción</li>
				</ul>
		    </div>
		    
		    <div class="column medium-offset-1 medium-3 col-4">
			    <h3>Branding</h3>
			    <ul class="list">
				     <li>Naming</li>
				     <li>Diseño Identidad Visual</li>
				     <li>Guías de Estilo digitales</li>
				     <li>Papelería corporativa</li>
				</ul>
		    </div>
		    
		     <div class="column medium-4 col-3">
			    <h3>Desarrollo</h3>
			    <ul class="list">
				    <li>Programación front-end</li>
				    <li>Gestor de Contenidos Dinámicos con Wordpress</li>
				    <li>Programación responsive</li>
				    <li>Sitios web estáticos con Jekyll</li>
				</ul>
		    </div>
		    
	    </div>
	    
	    
    </div>

    <div id="contact" class="block">
	    <div class="row">
		    
		    <div class="column medium-9 end">
	    
	    		<h2>CONTÁCTANOS SI ESTÁS PLANIFICANDO UN PROYECTO</h2>
				<h1>Equipo multidisciplinario, formado por colaboradores.</h1>
			
		    </div>
		    
	    </div>
	    
	    <div class="row">
		    
			<div class="column medium-3">
				
				<p>CLIENTES:<br> Trabajamos ayudando a emprendedores, pequeñas y medianas empresas de México.</p>
				
				<p>AGENCIAS:<br> Nos gusta colaborar con agencias y creativos, en nuevos e interesantes proyectos.</p>
				
				<p>SOMOS:<br> Estudio creado por Florencia Rosenfeld (diseñadora digital/UI/directora de proyectos). El equipo se arma según el tipo de proyecto que realicemos, si te interesa formar parte del equipo, escríbenos.</p>
			</div>

		    
			    <div class="column medium-8">
				    	<?php echo do_shortcode( '[contact-form-7 id="25" title="Contacto"]' ); ?>
				    
			    </div>
		    
	    </div>
    	
    </div>




<?php get_footer(); ?>