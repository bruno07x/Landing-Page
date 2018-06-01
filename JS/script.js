        // ÁREA DE TESTE
        // $(window).scroll(function () {
        //     if ($(this).scrollTop() > 480) {
        //         $(".movie").addClass("non-fixo");
        //     }else{
        //         $(".movie").removeClass("non-fixo");
        //     }
        //   });
        // CONTADOR FORMAT AAAA/MM/DIA
        dateFuture = new Date(2018, 5, 10);

        function GetCount() {

            dateNow = new Date(); //grab current date
            amount = dateFuture.getTime() - dateNow.getTime(); //calc milliseconds between dates
            delete dateNow;

            // time is already past
            if (amount < 0) {
                document.getElementById('countbox').innerHTML = "Now!";
            }
            // date is still good
            else {
                days = 0;
                hours = 0;
                mins = 0;
                secs = 0;
                out = "";

                amount = Math.floor(amount / 1000); //kill the "milliseconds" so just secs

                days = Math.floor(amount / 86400); //days
                amount = amount % 86400;

                hours = Math.floor(amount / 3600); //hours
                amount = amount % 3600;

                mins = Math.floor(amount / 60); //minutes
                amount = amount % 60;

                secs = Math.floor(amount); //seconds

                if (days != 0) {
                    out += days + " day" + ((days != 1) ? "s" : "") + ", ";
                }
                if (days != 0 || hours != 0) {
                    out += hours + " h" + ((hours != 1) ? "" : "") + ", ";
                }
                if (days != 0 || hours != 0 || mins != 0) {
                    out += mins + " m" + ((mins != 1) ? "" : "") + ", ";
                }
                out += secs + " s";
                document.getElementById('countbox').innerHTML = out;

                setTimeout("GetCount()", 1000);
            }
        }

        window.onload = function () {
            GetCount();
        }

// Efeito sanfona na SECA0 4
$(function () {
    $(".h2-sanfona-secao4").on("click", function(){
        esse = $(this);
        esse.parent().find('.sanfona').slideToggle("slow");
    });    
});

// SUBMIT
$(function(){
    $('.form-jquery').submit(function(){
        var dados = $(this).serialize();

        // Função para redirecionar página
        function redirecionar(){window.location.assign("aguardando.php");};

        $.ajax({
            url: 'validacao.php',
            data: dados,
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {  
                $('.load').fadeIn(500);
            },
            success: function (response) {
                $('.load').fadeOut(500);                

                if (response.Alerta) {
                    $('.box').html('<p class="boxErro alerta text-center">'+ response.Alerta +'</p>');              
                }
                else if (response.Erro) {
                    $('.box').html('<p class="boxErro erro text-center">'+ response.Erro +'</p>');
                } 
                else {
                    // $('.box').html('<p class="boxErro sucesso text-center">'+ response.Sucesso +'</p>').delay(2000);
                    redirecionar();
                }
            }
        });
        // Previne o carregamento da pag ao clicar no button do formulário
        return false;  
    });
});

// Função que aciona MODAL
function initModal(modal) 
{  
    // Var = armazena a modal passada como parametro
    var modal = document.getElementById(modal);
    // Adiciona a classe show para exibir modal
    modal.classList.add('show');
    // Caso usuário clicar fora do campo da modal ou no botão fechar, modal se fecha
    modal.addEventListener('click', function (e) {
        if (e.target.id == 'modalID' || e.target.className == 'fechar') {
            modal.classList.remove('show');
        }
      });
}
// Var = armazena o btn que irá acionar a modal
// var btn = document.querySelector('.btn-modal');

// Sempre que houver um clique no btn a modal irá se acionar
// btn.addEventListener('click', function () {  
//     initModal('modalID');
// });

$(function(){
    var btn = $('.btn-modal');
    btn.click(function(){
        initModal('modalID');
    });
    
});

// Debounce para não ficar executando o efeito
debounce = function(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};

// Função para animação com scroll
(function(){
var target = $('.anime');
var start = 'anime-start';
var offsetTela = $(window).height() * 3/4;

function animeScroll(){
    var documentTop = $(document).scrollTop();
    target.each(function () {
        var itemTop = $(this).offset().top;
        if (documentTop > itemTop - offsetTela) {
            $(this).addClass(start);
        }
      });
};
animeScroll();
$(function(){
    $(document).scroll(debounce (function(){
        animeScroll();
    },200));
});
}());