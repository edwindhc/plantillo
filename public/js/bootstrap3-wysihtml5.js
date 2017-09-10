!function($, wysi) {
    "use strict";

    var tpl = {
        "font-styles": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li class='dropdown'>" +
                "<a class='btn dropdown-toggle " + size + " btn-default' data-toggle='dropdown' href='#'>" +
                "<i class='glyphicon glyphicon-font'></i>&nbsp;<span class='current-font'>" + locale.font_styles.normal + "</span>&nbsp;<b class='caret'></b>" +
                "</a>" +
                "<ul class='dropdown-menu'>" +
                "<li><a data-wysihtml5-command='formatBlock' data-wysihtml5-command-value='div' tabindex='-1'>" + locale.font_styles.normal + "</a></li>" +
                "<li><a data-wysihtml5-command='formatBlock' data-wysihtml5-command-value='h1' tabindex='-1'>" + locale.font_styles.h1 + "</a></li>" +
                "<li><a data-wysihtml5-command='formatBlock' data-wysihtml5-command-value='h2' tabindex='-1'>" + locale.font_styles.h2 + "</a></li>" +
                "<li><a data-wysihtml5-command='formatBlock' data-wysihtml5-command-value='h3' tabindex='-1'>" + locale.font_styles.h3 + "</a></li>" +
                "<li><a data-wysihtml5-command='formatBlock' data-wysihtml5-command-value='h4'>" + locale.font_styles.h4 + "</a></li>" +
                "<li><a data-wysihtml5-command='formatBlock' data-wysihtml5-command-value='h5'>" + locale.font_styles.h5 + "</a></li>" +
                "<li><a data-wysihtml5-command='formatBlock' data-wysihtml5-command-value='h6'>" + locale.font_styles.h6 + "</a></li>" +
                "</ul>" +
                "</li>";
        },

        "emphasis": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
                "<div class='btn-group'>" +
                "<a class='btn " + size + " btn-default' data-wysihtml5-command='bold' title='CTRL+B' tabindex='-1'>" + locale.emphasis.bold + "</a>" +
                "<a class='btn " + size + " btn-default' data-wysihtml5-command='italic' title='CTRL+I' tabindex='-1'>" + locale.emphasis.italic + "</a>" +
                "<a class='btn " + size + " btn-default' data-wysihtml5-command='underline' title='CTRL+U' tabindex='-1'>" + locale.emphasis.underline + "</a>" +
                "</div>" +
                "</li>";
        },

        "lists": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
                "<div class='btn-group'>" +
                "<a class='btn " + size + " btn-default' data-wysihtml5-command='insertUnorderedList' title='" + locale.lists.unordered + "' tabindex='-1'><i class='glyphicon glyphicon-list'></i></a>" +
                "<a class='btn " + size + " btn-default' data-wysihtml5-command='insertOrderedList' title='" + locale.lists.ordered + "' tabindex='-1'><i class='glyphicon glyphicon-th-list'></i></a>" +
                "<a class='btn " + size + " btn-default' data-wysihtml5-command='Outdent' title='" + locale.lists.outdent + "' tabindex='-1'><i class='glyphicon glyphicon-indent-right'></i></a>" +
                "<a class='btn -" + size + " btn-default' data-wysihtml5-command='Indent' title='" + locale.lists.indent + "' tabindex='-1'><i class='glyphicon glyphicon-indent-left'></i></a>" +
                "</div>" +
                "</li>";
        },

        "link": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
                ""+
                "<div class='bootstrap-wysihtml5-insert-link-modal modal fade'>" +
                "<div class='modal-dialog'>"+
                "<div class='modal-content'>"+
                "<div class='modal-header'>" +
                "<a class='close' data-dismiss='modal'>&times;</a>" +
                "<h4>" + locale.link.insert + "</h4>" +
                "</div>" +
                "<div class='modal-body'>" +
                "<input value='http://' class='bootstrap-wysihtml5-insert-link-url form-control'>" +
                "<label class='checkbox'> <input type='checkbox' class='bootstrap-wysihtml5-insert-link-target' checked>" + locale.link.target + "</label>" +
                "</div>" +
                "<div class='modal-footer'>" +
                "<button class='btn btn-default' data-dismiss='modal'>" + locale.link.cancel + "</button>" +
                "<button href='#' class='btn btn-primary' data-dismiss='modal'>" + locale.link.insert + "</button>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "<a class='btn " + size + " btn-default' data-wysihtml5-command='createLink' title='" + locale.link.insert + "' tabindex='-1'><i class='glyphicon glyphicon-share'></i></a>" +
                "</li>";
        },

        "image": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
                "<div class='bootstrap-wysihtml5-insert-image-modal modal fade'>" +
                "<div class='modal-dialog'>"+
                "<div class='modal-content'>"+
                "<div class='modal-header'>" +
                "<a class='close' data-dismiss='modal'>&times;</a>" +
                "<h4>" + locale.image.insert + "</h4>" +
                "</div>" +
                "<div class='modal-body'>" +
                "<input value='http://' class='bootstrap-wysihtml5-insert-image-url form-control'>" +
                "</div>" +
                "<div class='modal-footer'>" +
                "<button class='btn btn-default' data-dismiss='modal'>" + locale.image.cancel + "</button>" +
                "<button class='btn btn-primary' data-dismiss='modal'>" + locale.image.insert + "</button>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "<a class='btn " + size + " btn-default' data-wysihtml5-command='insertImage' title='" + locale.image.insert + "' tabindex='-1'><i class='glyphicon glyphicon-picture'></i></a>" +
                "</li>";
        },

        "html": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li>" +
                "<div class='btn-group'>" +
                "<a class='btn " + size + " btn-default' data-wysihtml5-action='change_view' title='" + locale.html.edit + "' tabindex='-1'><i class='glyphicon glyphicon-pencil'></i></a>" +
                "</div>" +
                "</li>";
        },

        "color": function(locale, options) {
            var size = (options && options.size) ? ' btn-'+options.size : '';
            return "<li class='dropdown'>" +
                "<a class='btn dropdown-toggle " + size + " btn-default' data-toggle='dropdown' href='#' tabindex='-1'>" +
                "<span class='current-color'>" + locale.colours.black + "</span>&nbsp;<b class='caret'></b>" +
                "</a>" +
                "<ul class='dropdown-menu'>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='black'></div><a class='wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='black'>" + locale.colours.black + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='silver'></div><a class='wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='silver'>" + locale.colours.silver + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='gray'></div><a class='wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='gray'>" + locale.colours.gray + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='maroon'></div><a class='wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='maroon'>" + locale.colours.maroon + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='red'></div><a class='wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='red'>" + locale.colours.red + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='purple'></div><a class='wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='purple'>" + locale.colours.purple + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='green'></div><a class='wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='green'>" + locale.colours.green + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='olive'></div><a class='wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='olive'>" + locale.colours.olive + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='navy'></div><a class='wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='navy'>" + locale.colours.navy + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='blue'></div><a class='wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='blue'>" + locale.colours.blue + "</a></li>" +
                "<li><div class='wysihtml5-colors' data-wysihtml5-command-value='orange'></div><a class='wysihtml5-colors-title' data-wysihtml5-command='foreColor' data-wysihtml5-command-value='orange'>" + locale.colours.orange + "</a></li>" +
                "</ul>" +
                "</li>";
        }
    };

    var templates = function(key, locale, options) {
        return tpl[key](locale, options);
    };


    var Wysihtml5 = function(el, options) {
        this.el = el;
        var toolbarOpts = options || defaultOptions;
        for(var t in toolbarOpts.customTemplates) {
            tpl[t] = toolbarOpts.customTemplates[t];
        }
        this.toolbar = this.createToolbar(el, toolbarOpts);
        this.editor =  this.createEditor(options);

        window.editor = this.editor;

        $('iframe.wysihtml5-sandbox').each(function(i, el){
            $(el.contentWindow).off('focus.wysihtml5').on({
                'focus.wysihtml5' : function(){
                    $('li.dropdown').removeClass('open');
                }
            });
        });
    };

    Wysihtml5.prototype = {

        constructor: Wysihtml5,

        createEditor: function(options) {
            options = options || {};

            // Add the toolbar to a clone of the options object so multiple instances
            // of the WYISYWG don't break because "toolbar" is already defined
            options = $.extend(true, {}, options);
            options.toolbar = this.toolbar[0];

            var editor = new wysi.Editor(this.el[0], options);

            if(options && options.events) {
                for(var eventName in options.events) {
                    editor.on(eventName, options.events[eventName]);
                }
            }
            return editor;
        },

        createToolbar: function(el, options) {
            var self = this;
            var toolbar = $("<ul/>", {
                'class' : "wysihtml5-toolbar",
                'style': "display:none"
            });
            var culture = options.locale || defaultOptions.locale || "en";
            for(var key in defaultOptions) {
                var value = false;

                if(options[key] !== undefined) {
                    if(options[key] === true) {
                        value = true;
                    }
                } else {
                    value = defaultOptions[key];
                }

                if(value === true) {
                    toolbar.append(templates(key, locale[culture], options));



                    if(key === "html") {
                        this.initHtml(toolbar);
                    }

                    if(key === "link") {
                        this.initInsertLink(toolbar);
                    }

                    if(key === "image") {
                        this.initInsertImage(toolbar);
                    }
                }
            }

            if(options.toolbar) {
                for(key in options.toolbar) {
                    toolbar.append(options.toolbar[key]);
                }
            }

            toolbar.find("a[data-wysihtml5-command='formatBlock']").click(function(e) {
                var target = e.target || e.srcElement;
                var el = $(target);
                self.toolbar.find('.current-font').text(el.html());
            });

            toolbar.find("a[data-wysihtml5-command='foreColor']").click(function(e) {
                var target = e.target || e.srcElement;
                var el = $(target);
                self.toolbar.find('.current-color').text(el.html());
            });

            this.el.before(toolbar);

            return toolbar;
        },

        initHtml: function(toolbar) {
            var changeViewSelector = "a[data-wysihtml5-action='change_view']";
            toolbar.find(changeViewSelector).click(function(e) {
                toolbar.find('a.btn').not(changeViewSelector).toggleClass('disabled');
            });
        },

        initInsertImage: function(toolbar) {
            var self = this;
            var insertImageModal = toolbar.find('.bootstrap-wysihtml5-insert-image-modal');
            var urlInput = insertImageModal.find('.bootstrap-wysihtml5-insert-image-url');
            var insertButton = insertImageModal.find('.btn-primary');
            var initialValue = urlInput.val();
            var caretBookmark;

            var insertImage = function() {
                var url = urlInput.val();
                urlInput.val(initialValue);
                self.editor.currentView.element.focus();
                if (caretBookmark) {
                    self.editor.composer.selection.setBookmark(caretBookmark);
                    caretBookmark = null;
                }
                self.editor.composer.commands.exec("insertImage", url);
            };

            urlInput.keypress(function(e) {
                if(e.which == 13) {
                    insertImage();
                    insertImageModal.modal('hide');
                }
            });

            insertButton.click(insertImage);

            insertImageModal.on('shown', function() {
                urlInput.focus();
            });

            insertImageModal.on('hide', function() {
                self.editor.currentView.element.focus();
            });

            toolbar.find('a[data-wysihtml5-command=insertImage]').click(function() {
                var activeButton = $(this).hasClass("wysihtml5-command-active");

                if (!activeButton) {
                    self.editor.currentView.element.focus(false);
                    caretBookmark = self.editor.composer.selection.getBookmark();
                    insertImageModal.appendTo('body').modal('show');
                    insertImageModal.on('click.dismiss.modal', '[data-dismiss="modal"]', function(e) {
                        e.stopPropagation();
                    });
                    return false;
                }
                else {
                    return true;
                }
            });
        },

        initInsertLink: function(toolbar) {
            var self = this;
            var insertLinkModal = toolbar.find('.bootstrap-wysihtml5-insert-link-modal');
            var urlInput = insertLinkModal.find('.bootstrap-wysihtml5-insert-link-url');
            var targetInput = insertLinkModal.find('.bootstrap-wysihtml5-insert-link-target');
            var insertButton = insertLinkModal.find('.btn-primary');
            var initialValue = urlInput.val();
            var caretBookmark;

            var insertLink = function() {
                var url = urlInput.val();
                urlInput.val(initialValue);
                self.editor.currentView.element.focus();
                if (caretBookmark) {
                    self.editor.composer.selection.setBookmark(caretBookmark);
                    caretBookmark = null;
                }

                var newWindow = targetInput.prop("checked");
                self.editor.composer.commands.exec("createLink", {
                    'href' : url,
                    'target' : (newWindow ? '_blank' : '_self'),
                    'rel' : (newWindow ? 'nofollow' : '')
                });
            };
            var pressedEnter = false;

            urlInput.keypress(function(e) {
                if(e.which == 13) {
                    insertLink();
                    insertLinkModal.modal('hide');
                }
            });

            insertButton.click(insertLink);

            insertLinkModal.on('shown', function() {
                urlInput.focus();
            });

            insertLinkModal.on('hide', function() {
                self.editor.currentView.element.focus();
            });

            toolbar.find('a[data-wysihtml5-command=createLink]').click(function() {
                var activeButton = $(this).hasClass("wysihtml5-command-active");

                if (!activeButton) {
                    self.editor.currentView.element.focus(false);
                    caretBookmark = self.editor.composer.selection.getBookmark();
                    insertLinkModal.appendTo('body').modal('show');
                    insertLinkModal.on('click.dismiss.modal', '[data-dismiss="modal"]', function(e) {
                        e.stopPropagation();
                    });
                    return false;
                }
                else {
                    return true;
                }
            });
        }
    };

    // these define our public api
    var methods = {
        resetDefaults: function() {
            $.fn.wysihtml5.defaultOptions = $.extend(true, {}, $.fn.wysihtml5.defaultOptionsCache);
        },
        bypassDefaults: function(options) {
            return this.each(function () {
                var $this = $(this);
                $this.data('wysihtml5', new Wysihtml5($this, options));
            });
        },
        shallowExtend: function (options) {
            var settings = $.extend({}, $.fn.wysihtml5.defaultOptions, options || {}, $(this).data());
            var that = this;
            return methods.bypassDefaults.apply(that, [settings]);
        },
        deepExtend: function(options) {
            var settings = $.extend(true, {}, $.fn.wysihtml5.defaultOptions, options || {});
            var that = this;
            return methods.bypassDefaults.apply(that, [settings]);
        },
        init: function(options) {
            var that = this;
            return methods.shallowExtend.apply(that, [options]);
        }
    };

    $.fn.wysihtml5 = function ( method ) {
        if ( methods[method] ) {
            return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if ( typeof method === 'object' || ! method ) {
            return methods.init.apply( this, arguments );
        } else {
            $.error( 'Method ' +  method + ' does not exist on jQuery.wysihtml5' );
        }
    };

    $.fn.wysihtml5.Constructor = Wysihtml5;

    var defaultOptions = $.fn.wysihtml5.defaultOptions = {
        "font-styles": true,
        "color": true,
        "emphasis": true,
        "lists": true,
        "html": true,
        "link": true,
        "image": true,
        "size": 'sm',
        events: {},
        parserRules: {
            classes: {
                // (path_to_project/lib/css/bootstrap3-wysiwyg5-color.css)
                "wysiwyg-color-silver" : 1,
                "wysiwyg-color-gray" : 1,
                "wysiwyg-color-white" : 1,
                "wysiwyg-color-maroon" : 1,
                "wysiwyg-color-red" : 1,
                "wysiwyg-color-purple" : 1,
                "wysiwyg-color-fuchsia" : 1,
                "wysiwyg-color-green" : 1,
                "wysiwyg-color-lime" : 1,
                "wysiwyg-color-olive" : 1,
                "wysiwyg-color-yellow" : 1,
                "wysiwyg-color-navy" : 1,
                "wysiwyg-color-blue" : 1,
                "wysiwyg-color-teal" : 1,
                "wysiwyg-color-aqua" : 1,
                "wysiwyg-color-orange" : 1,
                "container" : 1,
                "row": 1,
                "col-xs-1":1,"col-xs-2":1,"col-xs-3":1,"col-xs-4":1,"col-xs-5":1,"col-xs-6":1,"col-xs-7":1,"col-xs-8":1,"col-xs-9":1,"col-xs-10":1,"col-xs-11":1,"col-xs-12":1,
                "col-sm-1":1,"col-sm-2":1,"col-sm-3":1,"col-sm-4":1,"col-sm-5":1,"col-sm-6":1,"col-sm-7":1,"col-sm-8":1,"col-sm-9":1,"col-sm-10":1,"col-sm-11":1,"col-sm-12":1,
                "col-md-1":1,"col-md-2":1,"col-md-3":1,"col-md-4":1,"col-md-5":1,"col-md-6":1,"col-md-7":1,"col-md-8":1,"col-md-9":1,"col-md-10":1,"col-md-11":1,"col-md-12":1,
                "col-lg-1":1,"col-lg-2":1,"col-lg-3":1,"col-lg-4":1,"col-lg-5":1,"col-lg-6":1,"col-lg-7":1,"col-lg-8":1,"col-lg-9":1,"col-lg-10":1,"col-lg-11":1,"col-lg-12":1,
                "img-responsive" : 1,
                "thumbnail": 1,
                "caption": 1,
                "list-inline": 1,
                "fa": 1,
                "fa-lg" : 1,
                "fa-2x" : 1,
				"fa-3x" : 1,
				"fa-4x" : 1,
				"fa-5x" : 1,
				"fa-fw" : 1,
				"fa-ul" : 1,
				"fa-li" : 1,
				"fa-border" : 1,
				"pul-right": 1,
				"pull-left":1,
				"fa-spin" : 1,
				"fa-rotate-90" : 1,
				"fa-rotate-180" : 1,
				"fa-rotate-270" : 1,
				"fa-flip-horizontal" : 1,
				"fa-flip-vertical" : 1,
				"fa-stack" : 1,
				"fa-stack-1x" : 1,
				"fa-stack-2x" : 1,
				"fa-inverse" : 1,
				"fa-glass": 1,
				"fa-music": 1,
				"fa-search" :1,
				"fa-envelope-o": 1,
				"fa-heart" :1,
				"fa-star": 1,
				"fa-star-o": 1,
				"fa-tint": 1,
				"fa-edit":1,
				"fa-pencil-square-o": 1,
				"fa-share-square-o": 1,
				"fa-check-square-o": 1,
				"fa-arrows" :1,
				"fa-step-backward": 1,
				"fa-fast-backward": 1,
				"fa-backward" :1,
				"fa-play": 1,
				"fa-pause" :1,
				"fa-stop": 1,
				"fa-forward" :1,
				"table":1,
				"table-hover":1,
				"table-bordered":1,
				"table-condensed": 1,
				"table-responsive":1,
				"form-control": 1,
				"form-horizontal":1,
				"form-inline":1,
				"btn":1,
				"btn-primary":1,
				"btn-success":1,
				"btn-warning":1,
				"btn-danger":1,
				"btn-default":1,
				"btn-info":1,
				"btn-lg":1,
				"btn-sm":1,
				"btn-xs":1,
				"collapse":1,
				"in":1,
				"fade":1,
				"collapsing":1,
				"caret":1,
				"open":1,
				"btn-group":1,
				"accordion-toggle":1,
				"panel":1,
				"panel-title":1,
				"panel-heading":1,
				"panel-body":1,
				"panel-group":1,
				"panel-collapse":1,
				"fa-ra":1,
				"fa-rebel": 1,
				"fa-ge":1,
				"fa-empire": 1,
				"fa-git-square": 1,
				"fa-git" :1,
				"fa-hacker-news": 1,
				"fa-tencent-weibo": 1,
				"fa-qq" :1,
				"fa-wechat":1,
				"fa-weixin": 1,
				"fa-send":1,
				"fa-paper-plane": 1,
				"fa-send-o":1,
				"fa-paper-plane-o": 1,
				"fa-history" :1,
				"fa-circle-thin": 1,
				"fa-header" :1,
				"fa-paragraph": 1,
				"fa-sliders" :1,
				"fa-share-alt": 1,
				"fa-share-alt-square": 1,
				"fa-bomb" :1,
				"fa-taxi": 1,
				"fa-tree" :1,
				"fa-spotify": 1,
				"fa-deviantart" :1,
				"fa-soundcloud": 1,
				"fa-database" :1,
				"fa-file-pdf-o": 1,
				"fa-file-word-o": 1,
				"fa-file-exce-o": 1,
				"fa-file-powerpoint-o": 1,
				"fa-file-photo-o":1,
				"fa-file-picture-o":1,
				"fa-file-image-o": 1,
				"fa-file-zip-o":1,
				"fa-file-archive-o": 1,
				"fa-file-sound-o":1,
				"fa-file-audio-o": 1,
				"fa-file-movie-o":1,
				"fa-file-video-o": 1,
				"fa-file-code-o": 1,
				"fa-vine" :1,
				"fa-codepen": 1,
				"fa-jsfiddle" :1,
				"fa-life-bouy":1,
				"fa-life-saver":1,
				"fa-support":1,
				"fa-life-ring": 1,
				"fa-circle-o-notch": 1,
				"fa-dot-circle-o": 1,
				"fa-wheelchair" :1,
				"fa-vimeo-square": 1,
				"fa-turkish-lira":1,
				"fa-try": 1,
				"fa-plus-square-o": 1,
				"fa-space-shuttle": 1,
				"fa-slack" :1,
				"fa-envelope-square": 1,
				"fa-wordpress" :1,
				"fa-openid": 1,
				"fa-institution":1,
				"fa-bank":1,
				"fa-university": 1,
				"fa-mortar-board":1,
				"fa-graduation-cap": 1,
				"fa-yahoo" :1,
				"fa-google": 1,
				"fa-reddit" :1,
				"fa-reddit-square": 1,
				"fa-stumbleupon-circle": 1,
				"fa-stumbleupon" :1,
				"fa-delicious": 1,
				"fa-digg" :1,
				"fa-pied-piper-square":1,
				"fa-pied-piper": 1,
				"fa-pied-piper-alt": 1,
				"fa-drupal" :1,
				"fa-joomla": 1,
				"fa-language" :1,
				"fa-fax": 1,
				"fa-building" :1,
				"fa-child": 1,
				"fa-paw" :1,
				"fa-spoon": 1,
				"fa-cube" :1,
				"fa-cubes": 1,
				"fa-behance" :1,
				"fa-behance-square": 1,
				"fa-steam" :1,
				"fa-steam-square": 1,
				"fa-recycle" :1,
				"fa-automobile":1,
				"fa-car": 1,
				"fa-cab":1,
				"fa-sort-alpha-asc": 1,
				"fa-sort-alpha-desc": 1,
				"fa-sort-amount-asc": 1,
				"fa-sort-amount-desc": 1,
				"fa-sort-numeric-asc": 1,
				"fa-sort-numeric-desc": 1,
				"fa-thumbs-up": 1,
				"fa-thumbs-down": 1,
				"fa-youtube-square": 1,
				"fa-youtube" :1,
				"fa-xing": 1,
				"fa-xing-square": 1,
				"fa-youtube-play": 1,
				"fa-dropbox" :1,
				"fa-stack-overflow": 1,
				"fa-instagram" :1,
				"fa-flickr": 1,
				"fa-adn" :1,
				"fa-bitbucket": 1,
				"fa-bitbucket-square": 1,
				"fa-tumblr" :1,
				"fa-tumblr-square": 1,
				"fa-long-arrow-down": 1,
				"fa-long-arrow-up": 1,
				"fa-long-arrow-left": 1,
				"fa-long-arrow-right": 1,
				"fa-apple" :1,
				"fa-windows": 1,
				"fa-android" :1,
				"fa-linux": 1,
				"fa-dribbble" :1,
				"fa-skype": 1,
				"fa-foursquare" :1,
				"fa-trello": 1,
				"fa-female" :1,
				"fa-male": 1,
				"fa-gittip" :1,
				"fa-sun-o": 1,
				"fa-moon-o": 1,
				"fa-archive" :1,
				"fa-bug": 1,
				"fa-vk" :1,
				"fa-weibo": 1,
				"fa-renren" :1,
				"fa-pagelines": 1,
				"fa-stack-exchange": 1,
				"fa-arrow-circle-o-right": 1,
				"fa-arrow-circle-o-left": 1,
				"fa-toggle-left":1,
				"fa-caret-square-o-left": 1,
				"fa-crop" :1,
				"fa-code-fork": 1,
				"fa-unlink":1,
				"fa-chain-broken": 1,
				"fa-question" :1,
				"fa-info": 1,
				"fa-exclamation" :1,
				"fa-superscript": 1,
				"fa-subscript" :1,
				"fa-eraser": 1,
				"fa-puzzle-piece": 1,
				"fa-microphone" :1,
				"fa-microphone-slash": 1,
				"fa-shield" :1,
				"fa-calendar-o": 1,
				"fa-fire-extinguisher": 1,
				"fa-rocket" :1,
				"fa-maxcdn": 1,
				"fa-chevron-circle-left": 1,
				"fa-chevron-circle-right": 1,
				"fa-chevron-circle-up": 1,
				"fa-chevron-circle-down": 1,
				"fa-html5" :1,
				"fa-css3": 1,
				"fa-anchor" :1,
				"fa-unlock-alt": 1,
				"fa-bullseye" :1,
				"fa-ellipsis-h": 1,
				"fa-ellipsis-v": 1,
				"fa-rss-square": 1,
				"fa-play-circle": 1,
				"fa-ticket" :1,
				"fa-minus-square": 1,
				"fa-minus-square-o": 1,
				"fa-leve-up": 1,
				"fa-level-down": 1,
				"fa-check-square": 1,
				"fa-penci-square": 1,
				"fa-external-link-square": 1,
				"fa-share-square": 1,
				"fa-compass" :1,
				"fa-toggle-down":1,
				"fa-caret-square-o-down": 1,
				"fa-toggle-up":1,
				"fa-caret-square-o-up": 1,
				"fa-toggle-right":1,
				"fa-caret-square-o-right": 1,
				"fa-euro":1,
				"fa-eur": 1,
				"fa-gbp" :1,
				"fa-dollar":1,
				"fa-usd": 1,
				"fa-rupee":1,
				"fa-inr": 1,
				"fa-cny":1,
				"fa-rmb":1,
				"fa-yen":1,
				"fa-jpy": 1,
				"fa-ruble":1,
				"fa-rouble":1,
				"fa-rub": 1,
				"fa-won":1,
				"fa-krw": 1,
				"fa-bitcoin":1,
				"fa-btc": 1,
				"fa-file" :1,
				"fa-file-text": 1,
				"fa-times-circle": 1,
				"fa-check-circle": 1,
				"fa-question-circle": 1,
				"fa-info-circle": 1,
				"fa-crosshairs" :1,
				"fa-times-circle-o": 1,
				"fa-check-circle-o": 1,
				"fa-ban" :1,
				"fa-arrow-left": 1,
				"fa-arrow-right": 1,
				"fa-arrow-up": 1,
				"fa-arrow-down": 1,
				"fa-mai-forward":1,
				"fa-share": 1,
				"fa-expand": 1,
				"fa-compress" :1,
				"fa-plus": 1,
				"fa-minus" :1,
				"fa-asterisk": 1,
				"fa-exclamation-circle": 1,
				"fa-gift" :1,
				"fa-leaf": 1,
				"fa-fire" :1,
				"fa-eye": 1,
				"fa-eye-slash": 1,
				"fa-warning" : 1,
				"fa-exclamation-triangle": 1,
				"fa-plane" :1,
				"fa-calendar": 1,
				"fa-random" :1,
				"fa-comment": 1,
				"fa-magnet" :1,
				"fa-chevron-up": 1,
				"fa-chevron-down": 1,
				"fa-retweet" :1,
				"fa-shopping-cart": 1,
				"fa-folder" :1,
				"fa-folder-open": 1,
				"fa-arrows-v": 1,
				"fa-arrows-h": 1,
				"fa-bar-chart-o": 1,
				"fa-twitter-square": 1,
				"fa-facebook-square": 1,
				"fa-camera-retro": 1,
				"fa-key" :1,
				"fa-gears": 1,
				"fa-cogs": 1,
				"fa-comments" :1,
				"fa-thumbs-o-up": 1,
				"fa-thumbs-o-down": 1,
				"fa-star-half": 1,
				"fa-heart-o": 1,
				"fa-sign-out": 1,
				"fa-linkedin-square": 1,
				"fa-thumb-tack": 1,
				"fa-externa-link": 1,
				"fa-sign-in": 1,
				"fa-trophy": 1,
				"fa-github-square": 1,
				"fa-upload" :1,
				"fa-lemon-o": 1,
				"fa-phone" :1,
				"fa-square-o": 1,
				"fa-bookmark-o": 1,
				"fa-phone-square": 1,
				"fa-twitter" :1,
				"fa-facebook": 1,
				"fa-github" :1,
				"fa-unlock": 1,
				"fa-credit-card": 1,
				"fa-rss" :1,
				"fa-hdd-o": 1,
				"fa-bullhorn" :1,
				"fa-bell": 1,
				"fa-certificate" :1,
				"fa-hand-o-right": 1,
				"fa-hand-o-left": 1,
				"fa-hand-o-up": 1,
				"fa-hand-o-down": 1,
				"fa-arrow-circle-left": 1,
				"fa-arrow-circle-right": 1,
				"fa-arrow-circle-up": 1,
				"fa-arrow-circle-down": 1,
				"fa-globe" :1,
				"fa-wrench": 1,
				"fa-tasks" :1,
				"fa-filter": 1,
				"fa-briefcase" :1,
				"fa-arrows-alt": 1,
				"fa-group": 1,
				"fa-users": 1,
				"fa-chain":1,
				"fa-link": 1,
				"fa-cloud" :1,
				"fa-flask": 1,
				"fa-cut":1,
				"fa-scissors": 1,
				"fa-copy":1,
				"fa-files-o": 1,
				"fa-paperclip" :1,
				"fa-save":1,
				"fa-floppy-o": 1,
				"fa-square" :1,
				"fa-navicon":1,
				"fa-reorder":1,
				"fa-bars": 1,
				"fa-list-ul": 1,
				"fa-list-ol": 1,
				"fa-strikethrough" :1,
				"fa-underline": 1,
				"fa-table" :1,
				"fa-magic": 1,
				"fa-truck" :1,
				"fa-pinterest": 1,
				"fa-pinterest-square": 1,
				"fa-google-plus-square": 1,
				"fa-google-plus": 1,
				"fa-money" :1,
				"fa-caret-down": 1,
				"fa-caret-up": 1,
				"fa-caret-left": 1,
				"fa-caret-right": 1,
				"fa-columns" :1,
				"fa-unsorted":1,
				"fa-sort": 1,
				"fa-sort-down":1,
				"fa-sort-desc": 1,
				"fa-sort-up":1,
				"fa-sort-asc": 1,
				"fa-envelope" :1,
				"fa-linkedin": 1,
				"fa-rotate-left":1,
				"fa-undo": 1,
				"fa-legal":1,
				"fa-gavel": 1,
				"fa-dashboard":1,
				"fa-tachometer": 1,
				"fa-comment-o": 1,
				"fa-comments-o": 1,
				"fa-flash":1,
				"fa-bolt": 1,
				"fa-sitemap" :1,
				"fa-umbrella": 1,
				"fa-paste":1,
				"fa-clipboard": 1,
				"fa-lightbulb-o": 1,
				"fa-exchange" :1,
				"fa-cloud-download": 1,
				"fa-cloud-upload": 1,
				"fa-user-md": 1,
				"fa-stethoscope" :1,
				"fa-suitcase": 1,
				"fa-bel-o": 1,
				"fa-coffee": 1,
				"fa-cutlery": 1,
				"fa-file-text-o": 1,
				"fa-building-o": 1,
				"fa-hospita-o": 1,
				"fa-ambulance": 1,
				"fa-medkit": 1,
				"fa-fighter-jet": 1,
				"fa-beer" :1,
				"fa-h-square": 1,
				"fa-plus-square": 1,
				"fa-angle-double-left": 1,
				"fa-angle-double-right": 1,
				"fa-angle-double-up": 1,
				"fa-angle-double-down": 1,
				"fa-angle-left": 1,
				"fa-angle-right": 1,
				"fa-angle-up": 1,
				"fa-angle-down": 1,
				"fa-desktop" :1,
				"fa-laptop": 1,
				"fa-tablet" :1,
				"fa-mobile-phone":1,
				"fa-mobile": 1,
				"fa-circle-o": 1,
				"fa-quote-left": 1,
				"fa-quote-right": 1,
				"fa-spinner" :1,
				"fa-circle": 1,
				"fa-mai-reply":1,
				"fa-reply": 1,
				"fa-github-alt": 1,
				"fa-folder-o": 1,
				"fa-folder-open-o": 1,
				"fa-smile-o": 1,
				"fa-frown-o": 1,
				"fa-meh-o": 1,
				"fa-gamepad" :1,
				"fa-keyboard-o": 1,
				"fa-flag-o": 1,
				"fa-flag-checkered": 1,
				"fa-terminal" :1,
				"fa-code": 1,
				"fa-mai-reply-all":1,
				"fa-reply-all": 1,
				"fa-star-half-empty":1,
				"fa-star-half-full":1,
				"fa-star-half-o": 1,
				"fa-location-arrow": 1,
				"fa-fast-forward": 1,
				"fa-step-forward": 1,
				"fa-eject" :1,
				"fa-chevron-left": 1,
				"fa-chevron-right": 1,
				"fa-plus-circle": 1,
				"fa-minus-circle": 1,
				"text-center":1,
				"text-left":1,
				"text-right":1,
            },
            tags: {
                "b":  {},
                "i":  {},
                "br": {},
                "ol": {},
                "ul": {},
                "li": {},
                "h1": {},
                "h2": {},
                "h3": {},
                "h4": {},
                "h5": {},
                "h6": {},
                "blockquote": {},
                "u": 1,
                "img": {
                    "check_attributes": {
                        "width": "numbers",
                        "alt": "alt",
                        "src": "url",
                        "height": "numbers"
                    }
                },
                "a":  {
                    check_attributes: {
                        'href': "url", // important to avoid XSS
                        'target': 'alt',
                        'rel': 'alt'
                    }
                },
                "span": 1,
                "div": 1,
                // to allow save and edit files with code tag hacks
                "code": 1,
                "pre": 1
            }
        },
        stylesheets: ["../bootstrap3-wysiwyg5-color.css"], // (path_to_project/lib/css/bootstrap3-wysiwyg5-color.css)
        locale: "en"
    };

    if (typeof $.fn.wysihtml5.defaultOptionsCache === 'undefined') {
        $.fn.wysihtml5.defaultOptionsCache = $.extend(true, {}, $.fn.wysihtml5.defaultOptions);
    }

    var locale = $.fn.wysihtml5.locale = {
        en: {
            font_styles: {
                normal: "Normal text",
                h1: "Heading 1",
                h2: "Heading 2",
                h3: "Heading 3",
                h4: "Heading 4",
                h5: "Heading 5",
                h6: "Heading 6"
            },
            emphasis: {
                bold: "Bold",
                italic: "Italic",
                underline: "Underline"
            },
            lists: {
                unordered: "Unordered list",
                ordered: "Ordered list",
                outdent: "Outdent",
                indent: "Indent"
            },
            link: {
                insert: "Insert link",
                cancel: "Cancel",
                target: "Open link in new window"
            },
            image: {
                insert: "Insert image",
                cancel: "Cancel"
            },
            html: {
                edit: "Edit HTML"
            },
            colours: {
                black: "Black",
                silver: "Silver",
                gray: "Grey",
                maroon: "Maroon",
                red: "Red",
                purple: "Purple",
                green: "Green",
                olive: "Olive",
                navy: "Navy",
                blue: "Blue",
                orange: "Orange"
            }
        }
    };

}(window.jQuery, window.wysihtml5);
