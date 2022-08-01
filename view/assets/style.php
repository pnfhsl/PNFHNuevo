<style>
<?php $marginLeft="40"; ?>

.mensajeError{
/*	background: #A52A2A !important;*/
	color: #A52A2A !important; 
}
 

.perfil-banner-box1{
	margin-left:<?=$marginLeft."%"?>;
	font-size:4vh;
}
.perfil-banner-box2-1{
	margin-top:5%;
	margin-left:<?php echo -5+$marginLeft."%"; ?>;
	font-size:4vh;
}
.perfil-banner-box2-2{
	margin-top:5%;
	margin-left:<?php echo 15+$marginLeft."%"; ?>;
	font-size:4vh;
}
.table_liderazgos_pedidos{
	margin-left:0;
}
.boxboxtop{
	/*margin-bottom:11%;*/
}
.box-image-foto{
	position:relative;
	/*top:70%;*/
	left:10%;
	text-align:center;
	margin:auto;
}
.boxboxfondobox{
	/*height:15vh;*/
}
.imgPerfil{
	background:#fff;
	position:relative;
	top:-5vh;
	margin:0;
	width:30vh;
	height:30vh;
	border-radius:100%;
	border:3px solid #777;
}
.boxPortada{
	height:70vh;
}
.textPerfil{
	text-align:left;
	font-size:2em;
}

@media screen and (min-width: 1040px) and (max-width: 1440px){
	.textPerfil{
		position:relative;
		left:10vh;
		font-size:2em;
		text-align:left;
	}
	.boxPortada{
		height:60vh;
	}

}
@media screen and (min-width: 1025px) and (max-width: 1139px){
	.textPerfil{
		position:relative;
		left:15vh;
		font-size:2em;
		text-align:left;
	}
	.boxPortada{
		height:50vh;
	}
}
@media screen and (min-width: 910px) and (max-width: 1024px){
	.textPerfil{
		position:relative;
		top:-5vh;
		font-size:2em;
		text-align:center;
	}
	.imgPerfil{
		width:15vh;
		height:15vh;
		left:10%;
	}
	.textPerfil1{
		top:1vh;
		left:-2vh;
	}
	.textPerfil2{
		top:1vh;
	}
	.boxPortada{
		height:30vh;
	}
}
@media screen and (min-width: 910px) and (max-width: 989px){
	.textPerfil{
		position:relative;
		top:-5vh;
		font-size:2em;
		text-align:center;
	}
	.imgPerfil{
		width:15vh;
		height:15vh;
		left:10%;
	}
	.textPerfil1{
		top:1vh;
		left:-2vh;
	}
	.textPerfil2{
		top:-8vh;
		left:13%;
	}
	.boxPortada{
		height:30vh;
	}
}

@media screen and (min-width: 768px) and (max-width: 909px){
	.textPerfil{
		position:relative;
		top:-5vh;
		font-size:2em;
		text-align:center;
	}
	.imgPerfil{
		width:12vh;
		height:12vh;
		left:10%;
	}
	.textPerfil1{
		top:1vh;
		left:0vh;
	}
	.textPerfil2{
		left:5vh;
	}
	.boxPortada{
		height:30vh;
	}

}
@media screen and (min-width: 690px) and (max-width: 767px){
	.textPerfil{
		position:relative;
		top:-5vh;
		font-size:2em;
		text-align:center;
	}
	.imgPerfil{
		width:30vh;
		height:30vh;
	}
	.boxPortada{
		height:30vh;
	}
	.table_liderazgos_pedidos{
		margin-left:-10%;
	}
	.totales th{
		font-size:1em;
	}
}
@media screen and (min-width: 100px) and (max-width: 689px){
	.textPerfil{
		position:relative;
		top:-5vh;
		font-size:2em;
		text-align:center;
	}
	.imgPerfil{
		width:30vh;
		height:30vh;
	}
	.boxPortada{
		height:30vh;
	}
	.table_liderazgos_pedidos{
		margin-left:-10%;
	}
	.totales th{
		font-size:1em;
	}
}
/*
	.box-image-foto{
		left:40%;
	}
	.perfil-banner-box1{
		margin-top:10%;
		margin-left:<?php echo -1+$marginLeft."%"; ?>;
		background:red;
	}
	.boxPortada{
		height:60vh;
	}
	.perfil-banner-box2-1{
		margin-top:15%;
		margin-left:<?php echo -7+$marginLeft."%"; ?>;		
	}
	.perfil-banner-box2-2{
		margin-top:15%;
		margin-left:<?php echo 19+$marginLeft."%"; ?>;
	}
	.boxboxtop{
		margin-bottom:27%;
	}
	.boxboxfondobox{
		height:30vh;
	}
	.box-image-foto{
		left:39%;
		top:65%;
	}
	.imgPerfil{
		width:35vh;
		height:35vh;
	}
	.perfil-banner-box1{
		margin-top:7%;
		margin-left:<?php echo -3+$marginLeft."%"; ?>;
		background:yellow;
	}
	.boxPortada{
		height:55vh;
	}
	.perfil-banner-box2-1{
		margin-top:12%;
		margin-left:<?php echo -10+$marginLeft."%"; ?>;		
	}
	.perfil-banner-box2-2{
		margin-top:12%;
		margin-left:<?php echo 10+$marginLeft."%"; ?>;
	}
	.boxboxtop{
		margin-bottom:25%;
	}
	.boxboxfondobox{
		height:35vh;
	}
	
}
@media screen and (min-width: 481px) and (max-width: 550px){
	.box-image-foto{
		left:20%;
		top:58%;
	}
	.imgPerfil{
		width:40vh;
		height:40vh;
	}
	.perfil-banner-box1{
		margin-top:7%;
		margin-left:<?php echo -3.5+$marginLeft."%"; ?>;
		background:purple;
	}
	.boxPortada{
		height:50vh;
	}
	.perfil-banner-box2-1{
		margin-top:12%;
		margin-left:<?php echo -10+$marginLeft."%"; ?>;		
	}
	.perfil-banner-box2-2{
		margin-top:12%;
		margin-left:<?php echo 10+$marginLeft."%"; ?>;
	}
	.boxboxtop{
		margin-bottom:25%;
	}
	.boxboxfondobox{
		height:35vh;
	}

}
@media screen and (min-width: 350px) and (max-width: 480px){
	.box-image-foto{
		left:15%;
		top:53%;
	}
	.imgPerfil{
		width:30vh;
		height:30vh;
	}
	.perfil-banner-box1{
		margin-top:30%;
		margin-left:<?php echo -15+$marginLeft."%"; ?>;
		background:green;
	}
	.boxPortada{
		height:35vh;
	}
	.perfil-banner-box2-1{
		margin-top:13%;
		margin-left:<?php echo -10+$marginLeft."%"; ?>;		
	}
	.perfil-banner-box2-2{
		margin-top:13%;
		margin-left:<?php echo 10+$marginLeft."%"; ?>;
	}
	.boxboxtop{
		margin-bottom:50%;
	}
	.boxboxfondobox{
		height:30vh;
	}
}
@media screen and (min-width: 100px) and (max-width: 349px){
	.box-image-foto{
		left:32%;
		top:50%;
	}
	.imgPerfil{
		width:50vh;
		height:50vh;
	}
	.perfil-banner-box1{
		margin-top:11%;
		margin-left:<?php echo -5+$marginLeft."%"; ?>;
		background:orange;
	}
	.perfil-banner-box2-1{
		margin-top:16%;
		margin-left:<?php echo -10+$marginLeft."%"; ?>;		
	}
	.perfil-banner-box2-2{
		margin-top:16%;
		margin-left:<?php echo 10+$marginLeft."%"; ?>;
	}
	.boxboxtop{
		margin-bottom:20%;
	}
	.boxboxfondobox{
		height:45vh;
	}
}*/


</style>




