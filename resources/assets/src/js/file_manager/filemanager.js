/**
 * Created by mainul on 9/22/16.
 */

FileManager = {
	init:function(args){
		this.args = args;
		this.args['get_url'] = args.get_url || 'http://localhost:8000/admin/media';
		this.args['selector'] = this.args.selector || '.file';
		this.args['target'] = args.target || $(this.args.selector).data('target-field');
		this.make();
		return this.$modelWrapper
	},
	make:function () {
		this.$body = $(this.args.selector).parents('body');
		this.$wrapper = $('<div class="x_content"></div>').appendTo(this.$body);
		this.$button = $(this.args.selector);
		this.$modelWrapper = $('<div class="modal fade">' +
			'<div class="modal-dialog modal-lg"><div class="modal-content">' +
			'<div class="modal-header">' +
			'<button type="button" class="close"><span aria-hidden="true">×</span></button>' +
			'<h4 class="modal-title"></h4></div>' +
			'<div class="modal-body"></div>' +
			'<div class="modal-footer"></div>' +
			'</div></div>' +
			'</div>').appendTo(this.$wrapper);
		this.$modelHeader = this.$modelWrapper.find('.modal-header');
		this.$modelTitle = this.$modelHeader.find('.modal-title');
		this.$modelCloseBtn = this.$modelHeader.find('.close:first');
		this.$modelBody = this.$modelWrapper.find('.modal-body');
		this.$modelFooter = this.$modelWrapper.find('.modal-footer');
		this.setTitle();
		this.setBody();
		this.setFooter();
		this.setup();

	},
	setTitle:function () {
		this.$modelTitle.html(this.args.title || "File Manager")
	},
	setup:function () {
		var me = this;
		this.$button.on('click',function () {
			me.$modelWrapper.modal('toggle');
			me.setBody()
		});

		this.$modelCloseBtn.on('click',function () {
			me.$modelWrapper.modal('hide')
		});
	},
	setBody:function () {
		var $content = $('<ul />');
		$content.addClass('file-manager-body-ul');
		var me = this;
		$.ajax({
			url:this.args.get_url,
			data:this.args.data || {},
			success:function (r) {
				if (r.data) {
					$.each(r.data,function (key, val) {
						var item = $('<li />');
						var img = $('<img />').appendTo(item);
						img.attr({
							'src': val.thumbnail_url,
							'alt': val.alt
						});
						item.attr({
							"data-image-id": val.id,
							"data-url": val.url,
							"data-thumbnail": val.thumbnail_url,
							"data-preview": val.preview_rul
						});
						item.on('click',function () {
							item.toggleClass('active');
						});
						$content.append(item)
					});
					$content.append('<div class="clearfix"></div>');
					me.$modelBody.html($content)
				}else {
					me.$modelBody.html('<h2 class="text-muted">No media found</h2>')
				}
			}
		});
	},
	setFooter:function () {
		var $content = '';
		this.$modelFooter.html($content)
	}
};

(function( $ ) {

	$.fn.FileManager = function(args) {
		this.args = args;
		this.args.selector = this;
		this.FileManager = FileManager;
		this.FileManager.init(this.args);

		return this;

	};

}( jQuery ));