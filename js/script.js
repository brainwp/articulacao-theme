// jQuery Mask Plugin v1.7.7
// github.com/igorescobar/jQuery-Mask-Plugin
(function(f){"function"===typeof define&&define.amd?define(["jquery"],f):f(window.jQuery||window.Zepto)})(function(f){var A=function(a,d,b){var h=this,m,p;a=f(a);d="function"===typeof d?d(a.val(),void 0,a,b):d;var c={getCaret:function(){try{var e,l=0,c=a.get(0),g=document.selection,d=c.selectionStart;if(g&&!~navigator.appVersion.indexOf("MSIE 10"))e=g.createRange(),e.moveStart("character",a.is("input")?-a.val().length:-a.text().length),l=e.text.length;else if(d||"0"===d)l=d;return l}catch(b){}},setCaret:function(e){try{if(a.is(":focus")){var l,
c=a.get(0);c.setSelectionRange?c.setSelectionRange(e,e):c.createTextRange&&(l=c.createTextRange(),l.collapse(!0),l.moveEnd("character",e),l.moveStart("character",e),l.select())}}catch(g){}},events:function(){a.on("keydown.mask",function(){m=c.val()}).on("keyup.mask",c.behaviour).on("paste.mask drop.mask",function(){setTimeout(function(){a.keydown().keyup()},100)}).on("change.mask",function(){a.data("changed",!0)}).on("blur.mask",function(){m===a.val()||a.data("changed")||a.trigger("change");a.data("changed",
!1)}).on("focusout.mask",function(){b.clearIfNotMatch&&!p.test(c.val())&&c.val("")})},getRegexMask:function(){for(var e=[],a,c,g,b,k=0;k<d.length;k++)(a=h.translation[d[k]])?(c=a.pattern.toString().replace(/.{1}$|^.{1}/g,""),g=a.optional,(a=a.recursive)?(e.push(d[k]),b={digit:d[k],pattern:c}):e.push(g||a?c+"?":c)):e.push(d[k].replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&"));e=e.join("");b&&(e=e.replace(new RegExp("("+b.digit+"(.*"+b.digit+")?)"),"($1)?").replace(new RegExp(b.digit,"g"),b.pattern));return new RegExp(e)},
destroyEvents:function(){a.off("keydown keyup paste drop change blur focusout DOMNodeInserted ".split(" ").join(".mask ")).removeData("changeCalled")},val:function(e){var c=a.is("input");return 0<arguments.length?c?a.val(e):a.text(e):c?a.val():a.text()},getMCharsBeforeCount:function(e,a){for(var c=0,b=0,f=d.length;b<f&&b<e;b++)h.translation[d.charAt(b)]||(e=a?e+1:e,c++);return c},caretPos:function(e,a,b,g){return h.translation[d.charAt(Math.min(e-1,d.length-1))]?Math.min(e+b-a-g,b):c.caretPos(e+1,
a,b,g)},behaviour:function(a){a=a||window.event;var b=a.keyCode||a.which;if(-1===f.inArray(b,h.byPassKeys)){var d=c.getCaret(),g=c.val(),t=g.length,k=d<t,m=c.getMasked(),n=m.length,p=c.getMCharsBeforeCount(n-1)-c.getMCharsBeforeCount(t-1);m!==g&&c.val(m);!k||65===b&&a.ctrlKey||(8!==b&&46!==b&&(d=c.caretPos(d,t,n,p)),c.setCaret(d));return c.callbacks(a)}},getMasked:function(a){var l=[],f=c.val(),g=0,m=d.length,k=0,p=f.length,n=1,u="push",r=-1,q,v;b.reverse?(u="unshift",n=-1,q=0,g=m-1,k=p-1,v=function(){return-1<
g&&-1<k}):(q=m-1,v=function(){return g<m&&k<p});for(;v();){var w=d.charAt(g),x=f.charAt(k),s=h.translation[w];if(s)x.match(s.pattern)?(l[u](x),s.recursive&&(-1===r?r=g:g===q&&(g=r-n),q===r&&(g-=n)),g+=n):s.optional&&(g+=n,k-=n),k+=n;else{if(!a)l[u](w);x===w&&(k+=n);g+=n}}a=d.charAt(q);m!==p+1||h.translation[a]||l.push(a);return l.join("")},callbacks:function(e){var f=c.val(),h=f!==m;if(!0===h&&"function"===typeof b.onChange)b.onChange(f,e,a,b);if(!0===h&&"function"===typeof b.onKeyPress)b.onKeyPress(f,
e,a,b);if("function"===typeof b.onComplete&&f.length===d.length)b.onComplete(f,e,a,b)}};h.mask=d;h.options=b;h.remove=function(){var b;c.destroyEvents();c.val(h.getCleanVal()).removeAttr("maxlength");b=c.getCaret();c.setCaret(b-c.getMCharsBeforeCount(b));return a};h.getCleanVal=function(){return c.getMasked(!0)};h.init=function(){b=b||{};h.byPassKeys=[9,16,17,18,36,37,38,39,40,91];h.translation={0:{pattern:/\d/},9:{pattern:/\d/,optional:!0},"#":{pattern:/\d/,recursive:!0},A:{pattern:/[a-zA-Z0-9]/},
S:{pattern:/[a-zA-Z]/}};h.translation=f.extend({},h.translation,b.translation);h=f.extend(!0,{},h,b);p=c.getRegexMask();!1!==b.maxlength&&a.attr("maxlength",d.length);b.placeholder&&a.attr("placeholder",b.placeholder);a.attr("autocomplete","off");c.destroyEvents();c.events();var e=c.getCaret();c.val(c.getMasked());c.setCaret(e+c.getMCharsBeforeCount(e,!0))}()},y={},z=function(){var a=f(this),d={};a.attr("data-mask-reverse")&&(d.reverse=!0);"false"===a.attr("data-mask-maxlength")&&(d.maxlength=!1);
a.attr("data-mask-clearifnotmatch")&&(d.clearIfNotMatch=!0);a.mask(a.attr("data-mask"),d)};f.fn.mask=function(a,d){var b=this.selector,h=function(){var b=f(this).data("mask"),h=JSON.stringify;if("object"!==typeof b||h(b.options)!==h(d)||b.mask!==a)return f(this).data("mask",new A(this,a,d))};this.each(h);b&&!y[b]&&(y[b]=!0,setTimeout(function(){f(document).on("DOMNodeInserted.mask",b,h)},500))};f.fn.unmask=function(){try{return this.each(function(){f(this).data("mask").remove().removeData("mask")})}catch(a){}};
f.fn.cleanVal=function(){return this.data("mask").getCleanVal()};f("*[data-mask]").each(z);f(document).on("DOMNodeInserted.mask","*[data-mask]",z)});
(function ($) {
jQuery(document).ready(function(){
	$( 'body #post' ).on( 'mouseover mouseout', function( e ) {
		tinyMCE.triggerSave();
	});

	//form register validation
	$('#form-register').on('submit', function(e){
		var pw = $('#password-1').val();
		var pw_check  = $('#password-2').val();
		if(pw != pw_check){
			e.preventDefault();
			alert('Erro: As senhas não batem');
		}
	});
	$( 'select[name="user_type"' ).on( 'change', function(e) {
		if( $( this ).val() == 'Outros' ) {
			$( '#label-user-type' ).fadeIn(1200);
			$( '#label-user-type input' ).attr( 'required', 'true' );
		} else {
			$( '#label-user-type' ).fadeOut( 1200 );
			$( '#label-user-type input' ).removeAttr( 'required' );
		}
	});
    $( '#form-register input[name="fone"]' ).mask( '(00) 0000-00009' );
	// Navigation
	if ( jQuery(window).width() <= 768 ) {
		jQuery( '#header ul.menu' ).hide();
	}
	jQuery( '.site-navigation h1.assistive-text' ).click(function(e) {
		jQuery( '#header ul.menu' ).slideToggle();
	});

	// Add .parent class to appropriate menu items
	jQuery( 'ul.sub-menu' ).parent().addClass( 'parent' );

	jQuery( 'body' ).fitVids();

	// Fix the post box when scrolling
	var breakpoint  = 1200;
	var bh          = $( 'body' ).height();
	var wh          = $(window).height();
	var pbh         = $( '#postbox .postboxcontent' ).height();
	var pbw         = $( '#postbox' ).width();
	var pos         = $( '#postbox .postboxcontent' ).position();

	$(window).scroll(function() {
		// Only fix it in position if the window is wider than the layout breakpoint
		// and if the postbox is not taller than the window
		if ( jQuery( window ).width() > breakpoint && pbh < ( wh - 124 ) ) {

			var offset  = 0;
			var sticky  = false;
			var top     = $(window).scrollTop();
			var pbw     = $( '#postbox' ).width();

			if ( $( '#wrapper' ).offset().top < top + 120 ) {
				$( '#postbox .postboxcontent' ).addClass( 'fixed' );
				sticky = true;
			} else {
				$( '#postbox .postboxcontent' ).removeClass( 'fixed' );
			}

			$( '#postbox .postboxcontent' ).css( 'width', pbw );
		}

	});

	// Make sure the post textarea doesn't grow too tall
	if ( jQuery( window ).width() > breakpoint ) {
		var npbh    = wh - 400;
		jQuery( '#posttext' ).css({ "max-height": npbh + 'px' });
	}

	// Check the position / textarea height on window resize
	$(window).resize(function(){
		if ( jQuery( window ).width() > breakpoint ) {
			var pbw       = jQuery('#postbox').width();
			var wh        = jQuery( window ).height();
			var npbh      = wh - 400;
			jQuery( '#postbox .postboxcontent' ).css( 'width', pbw );
			jQuery( '#posttext' ).css({ "max-height": npbh + 'px' });
		} else {
			jQuery( '#postbox .postboxcontent' ).removeClass( 'fixed' ).removeAttr( 'style' );
		}
	});

	// Also scroll to top when postbox textarea is focused
	jQuery( '#postbox .inputarea textarea' ).focus(function () {
		jQuery( 'body,html' ).animate({
			scrollTop: 0
		}, 800);
		return false;
	});

	// Hide the tag / submit inputs until the postbox label is clicked
	jQuery( '#postbox .inputs' ).hide();
	jQuery( '#post-prompt' ).click(function () {
		jQuery(this).toggleClass( 'active' );
		jQuery( '#postbox .inputs' ).slideToggle( 400 );
		jQuery( '#posttext' ).focus();
		return false;
	});

});
jQuery(window).resize(function(){

	// Navigation
	if ( jQuery(window).width() > 768 ) {
		jQuery( '#header ul.menu' ).show();
	} else {
		jQuery( '#header ul.menu' ).hide();
	}

});
}
(jQuery));
/* global odinAdminParams */
(function ( $ ) {
	'use strict';

	/**
	 * Theme Options and Metaboxes.
	 */
	$( function () {

		/**
		 * Image field.
		 */
		$( '.odin-upload-image .button' ).on( 'click', function ( e ) {
			e.preventDefault();

			var uploadFrame,
				uploadInput = $(this).siblings( '.image' ),
				uploadPreview = $(this).siblings( '.preview' );

			// If the media frame already exists, reopen it.
			if ( uploadFrame ) {
				uploadFrame.open();

				return;
			}

			// Create the media frame.
			uploadFrame = wp.media.frames.downloadable_file = wp.media({
				title: odinAdminParams.uploadTitle,
				button: {
					text: odinAdminParams.uploadButton
				},
				multiple: false,
				library: {
					type: 'image'
				}
			});

			uploadFrame.on( 'select', function () {
				var attachment = uploadFrame.state().get( 'selection' ).first().toJSON();
				uploadPreview.attr( 'src', attachment.url );
				uploadInput.val( attachment.id );
			});

			// Finally, open the modal.
			uploadFrame.open();
		});

		$( '.odin-upload-image .delete' ).click( function ( e ) {
			e.preventDefault();

			var wrapper      = $( this ).parents( '.odin-upload-image' ),
				defaultImage = $( '.default-image', wrapper ).text();

			$( '.image', wrapper ).val( '' );
			$( '.preview', wrapper ).attr( 'src', defaultImage );
		});

		/**
		 * Upload.
		 */
		$( '.odin-upload-button' ).on( 'click', function ( e ) {
			e.preventDefault();

			var uploadFrame,
				uploadInput = $( this ).prev( 'input' );

			// If the media frame already exists, reopen it.
			if ( uploadFrame ) {
				uploadFrame.open();

				return;
			}

			// Create the media frame.
			uploadFrame = wp.media.frames.downloadable_file = wp.media({
				title: odinAdminParams.uploadTitle,
				button: {
					text: odinAdminParams.uploadButton
				},
				multiple: false
			});

			uploadFrame.on( 'select', function () {
				var attachment = uploadFrame.state().get( 'selection').first().toJSON();
				uploadInput.val( attachment.url );
			});

			// Finally, open the modal.
			uploadFrame.open();
		});


		/**
		 * Image plupload adds.
		 */
		$( '.odin-gallery-container' ).on( 'click', '.odin-gallery-add', function ( e ) {
			e.preventDefault();

			var galleryFrame,
				galleryWrap = $( this ).parent( '.odin-gallery-container' ),
				imageGalleryIds = $( '.odin-gallery-field', galleryWrap ),
				images = $( 'ul.odin-gallery-images', galleryWrap ),
				attachmentIds = imageGalleryIds.val();

			// If the media frame already exists, reopen it.
			if ( galleryFrame ) {
				galleryFrame.open();

				return;
			}

			// Create the media frame.
			galleryFrame = wp.media.frames.downloadable_file = wp.media({
				title: odinAdminParams.galleryTitle,
				button: {
					text: odinAdminParams.galleryButton
				},
				multiple: true,
				library: {
					type: 'image'
				}
			});

			// When an image is selected, run a callback.
			galleryFrame.on( 'select', function () {

				var selection = galleryFrame.state().get( 'selection' );

				selection.map( function ( attachment ) {

					attachment = attachment.toJSON();

					if ( attachment.id ) {
						attachmentIds = attachmentIds ? attachmentIds + ',' + attachment.id : attachment.id;

						images.append( '<li class="image" data-attachment_id="' + attachment.id + '"><img src="' + attachment.url + '" /><ul class="actions"><li><a href="#" class="delete" title="' + odinAdminParams.galleryRemove + '">X</a></li></ul></li>' );
					}

				});

				imageGalleryIds.val( attachmentIds );
			});

			// Finally, open the modal.
			galleryFrame.open();
		});

		/**
		 * Image plupload ordering.
		 */
		$( '.odin-gallery-container' ).on( 'mouseover', 'ul.odin-gallery-images', function () {
			var galleryWrap = $( this ).parent( '.odin-gallery-container' ),
				imageGalleryIds = $( '.odin-gallery-field', galleryWrap );

			// Call the sortable action.
			$( this ).sortable({
				items: 'li.image',
				cursor: 'move',
				scrollSensitivity: 40,
				forcePlaceholderSize: true,
				forceHelperSize: false,
				helper: 'clone',
				opacity: 0.65,
				placeholder: 'wc-metabox-sortable-placeholder',
				start: function ( event, ui ) {
					ui.item.css('background-color', '#f6f6f6');
				}, stop: function ( event, ui ) {
					ui.item.removeAttr( 'style' );
				}, update: function () {
					var attachmentIds = '';

					// Gets the current ids.
					$( 'li.image', $( this ) ).css( 'cursor', 'default' ).each( function () {
						var attachmentId = $( this ).attr( 'data-attachment_id' );
						attachmentIds = attachmentIds + attachmentId + ',';
					});

					// Return the new value.
					imageGalleryIds.val( attachmentIds );
				}
			});
		});

		/**
		 * Image plupload remove link.
		 */
		$( '.odin-gallery-container' ).on( 'click', 'a.delete', function ( e ) {
			e.preventDefault();

			var galleryWrap = $( this ).parents( '.odin-gallery-container' ),
				imageGalleryIds = $( '.odin-gallery-field', galleryWrap ),
				attachmentIds = '';

			// Remove the item.
			$( this ).closest( 'li.image' ).remove();

			// Gets the current ids.
			$( 'ul li.image', galleryWrap ).css( 'cursor', 'default' ).each( function () {
				var attachmentId = $( this ).attr( 'data-attachment_id' );
				attachmentIds = attachmentIds ? attachmentIds + ',' + attachmentId : attachmentId;
			});

			// Return the new value.
			imageGalleryIds.val( attachmentIds );
		});
		/**
		 * Save editor field in add term screen
		 */
		$( 'body.edit-tags-php .wp-editor-wrap' ).on( 'mouseover mouseout', function( e ) {
			tinyMCE.triggerSave();
		});
		$( document ).ajaxSend(function( event, request, settings ) {
  			console.log( request );
  			console.log( settings );
  			setTimeout( function(){

  			}, 3000);
		});
	});
}( jQuery ));
