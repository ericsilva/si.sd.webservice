/**
 * 
 */
var App = {
	/**
	 * Campo de busca
	 */
	field : "",
	/**
	 * Container do resultado
	 */
	result : "",

	init : function() {

		this.field = $("#q");
		this.result = $("#result");

		this.field.addClass("idle");
		this.field.focus(function() {
			$(this).removeClass("idle").addClass("focus");
		});

		this.field.blur(function() {
			$(this).removeClass("focus").addClass("idle");
		});

		this.field.focus();

	},

	search : function(q) {
		var html = "";

		// Realcando o campo, caso nada seja digitado
		if (!q || $.trim(q) == "") {
			this.field.css("border", "1px solid red");
			return false;
		}

		this.field.css("border", "solid 2px #DFDFDF");
		App.result.html("Pesquisando...");

		$.getJSON("https://www.googleapis.com/books/v1/volumes?q=" + q
				+ "&callback=?", {
			q : q
		}, function(data, textStatus) {
			
			if(data.items) {

				$.each(data.items, function(i, book) {
					
					book.volumeInfo.subtitle = (undefined != book.volumeInfo.subtitle) ? book.volumeInfo.subtitle : "";
					book.volumeInfo.publishedDate = (undefined != book.volumeInfo.publishedDate) ? book.volumeInfo.publishedDate + "," : "";
					book.volumeInfo.pageCount = (undefined != book.volumeInfo.pageCount) ? book.volumeInfo.pageCount : "";
					book.volumeInfo.description = (undefined != book.volumeInfo.description) ? book.volumeInfo.description : "";
					book.volumeInfo.publisher = (undefined != book.volumeInfo.publisher) ? book.volumeInfo.publisher : "";
					
					if(book.volumeInfo.previewLink) {
						book.volumeInfo.subtitle += " <a href='" + book.volumeInfo.previewLink + "' target='_blank'>(Ver livro)</a>";
					}
	
					/**
					 * Inicio do livro 
					 */
					html += "<div class=\"livro\">";
	
					/**
					 * Titulo
					 */
					html += "<div class=\"titulo\">" + book.volumeInfo.title + " "
							+ book.volumeInfo.subtitle + "<br />"
							+ book.volumeInfo.publishedDate + " " + book.volumeInfo.pageCount
							+ " P&aacute;ginas</div>";
					
					/**
					 * Autores
					 */
					html += "<div class=\"autores\">";
					if (book.volumeInfo.authors) {
						$.each(book.volumeInfo.authors, function(j, autor) {
							html += "<span>" + autor + "</span>";
						});
					}
					html += "</div>";
	
					/**
					 * Descricao
					 */
					html += "<div class=\"descricao\">"
							+ book.volumeInfo.description + "</div>";
	
					/**
					 * Categorias
					 */
					/**
					html += "<div class=\"categorias\">";
					if (book.volumeInfo.categories) {
						$.each(book.volumeInfo.categories, function(k, categoria) {
							html += "<span>" + categoria + "</span>";
						});
					}
					html += "</div>";
					**/
										
					// Fim do livro
					html += "</div>";
	
				});
			} else {
				html = "Não foram encontrados resultados.";				
			}

			App.result.html(html);

		});

		// Evitando o submit do formulario
		return false;
	}
};