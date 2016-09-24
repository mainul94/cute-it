/**
 * Created by mainul on 9/22/16.
 */

FileManager = {
	init:function(args, callback){
		if (callback !== "undefiend") {
			this.callback = callback
		}
		this.args = {};
		this.args['baseUrl'] = window.location.host;
		this.args['get_url'] = this.args.baseUrl+'/media';
		this.args['selector'] = '.file';
		this.args['target'] = $(this.args.selector).data('target-field');
		this.args['multiple'] = false;
		this.args['multiple_val_attr'] = 'data-url';
		this.args = $.extend(this.args, args);
		this.make()
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
			// me.setBody()
		});

		this.$modelCloseBtn.on('click',function () {
			me.$modelWrapper.modal('hide');
			me.$filesWrapper.find('.active').removeClass('active');
			me.selectedFilesCount();
		});
	},
	setBody:function () {
		this.$filesWrapper = $('<ul />');
		this.$filesWrapper.addClass('file-manager-body-ul');
		this.$modelBody.html(this.$filesWrapper);
		this.$filesWrapper.append('<div class="clearfix"></div>');
		this.$modelPaginateWrp = $('<div class="paginate col-xs-12 text-right"></div>').appendTo(this.$modelBody);
		this.$modelBody.append('<div class="clearfix"></div>');
		this.callAjax();
	},
	callAjax:function () {
		var me = this;
		$.ajax({
			url:me.args.get_url,
			data:me.args.ajaxData || {},
			success:function (r) {
				me.setAjaxSuccessData(r)
			}
		});
	},
	setAjaxSuccessData:function (r) {
		var me = this;
		if (r.data) {
			$.each(r.data,function (key, val) {
				var item = $('<li />');
				var img = $('<img />').appendTo(item);
				img.attr({
					'src': me.args.baseUrl + val.thumbnail_url,
					'alt': me.args.baseUrl + val.alt
				});
				item.attr({
					"data-image-id": val.id,
					"data-url": me.args.baseUrl + val.url,
					"data-thumbnail": me.args.baseUrl + val.thumbnail_url,
					"data-preview": me.args.baseUrl + val.preview_rul
				});
				item.on('click',function () {
					item.toggleClass('active');
					if (!me.args.multiple) {
						me.$filesWrapper.find('.active').not(this).removeClass('active')
					}
					me.selectedFilesCount()
				});
				me.$filesWrapper.append(item)
			});
		}

		if (r.next_page_url) {
			me.$nextPage = $('<button />');
			me.$nextPage.addClass('btn btn-default');
			me.$nextPage.html('More');
			me.$modelPaginateWrp.html(me.$nextPage);
			me.args.ajaxData = {
				'page':++r.current_page
			};
			me.$nextPage.on('click', function () {
				me.callAjax()
			});
		}else {
			me.args.ajaxData = {};
			me.$modelPaginateWrp.html('')
		}
	},
	setFooter:function () {
		var $content = '';
		var me = this;
		this.$modelFooter.html($content);
		this.$modelFooterCloseBtn = $('<button type="button">Close</button>').appendTo(this.$modelFooter);
		this.$modelFooterCloseBtn.addClass('btn btn-default');
		this.$modelFooterCloseBtn.on('click',function () {
			me.$modelCloseBtn.trigger('click')
		});
		this.$modelFooterInsertBtn = $('<button type="button">Insert</button>').appendTo(this.$modelFooter);
		this.$modelFooterInsertBtn.addClass('btn btn-primary');
		this.$modelFooterInsertBtn.on('click', function () {
			me.insert();
			me.$modelCloseBtn.trigger('click')
		});
		this.$modelFooterHelp = $('<span />');
		this.selectedFilesCount()
	},
	selectedFilesCount:function () {
		this.$modelFooter.prepend(this.$modelFooterHelp);
		this.$modelFooterHelp.addClass('pull-left');
		var count = this.$modelWrapper.find('.active').length;
		this.$modelFooterHelp.html(count +' '+ (count > 1?'Files':'File')+' Selected')
	},
	insert:function () {
		var me = this;
		var target_value = null;
		if (this.args.multiple) {
			target_value= [];
			this.$filesWrapper.find('.active').each(function (el, val) {
				target_value.push($(val).attr(me.args.multiple_val_attr));
			})
		}else {
			if (this.$filesWrapper.find('.active').length > 0) {
				target_value = this.$filesWrapper.find('.active').first().data('url');
			}
		}
		if (this.callback) {
			this.callback($(this.args.target),target_value)
		}
		$(this.args.target).val(target_value)
	}
};

(function( $ ) {

	$.fn.FileManager = function(args, callback) {
		this.args = args;
		this.args.selector = this;
		this.FileManager = FileManager;
		this.FileManager.init(this.args, callback);

		return this;

	};

}( jQuery ));