function ajax_loadTabContent(tab_name,page_num,container,args_obj){var container=jQuery(container);var tab_content=container.find("#"+tab_name+"-tab-content");var isLoaded=tab_content.data("loaded");if(!isLoaded||page_num!=1){if(!container.hasClass("ajax-loading")){container.addClass("ajax-loading");tab_content.load(ajax_tab.ajax_url,{action:"ajax_widget_content",tab:tab_name,page:page_num,args:args_obj},function(){container.removeClass("ajax-loading");tab_content.data("loaded",1).hide().fadeIn().siblings().hide()})}}else{tab_content.fadeIn().siblings().hide()}}jQuery(document).ready(function(){jQuery(".ajax_widget_content").each(function(){var $this=jQuery(this);var widget_id=this.id;var args=$this.data("args");$this.find(".ajax-tabs a").click(function(e){e.preventDefault();jQuery(this).parent().addClass("selected").siblings().removeClass("selected");var tab_name=this.id.slice(0,-4);ajax_loadTabContent(tab_name,1,$this,args)});$this.on("click",".ajax-pagination a",function(e){e.preventDefault();var $this_a=jQuery(this);var tab_name=$this_a.closest(".tab-content").attr("id").slice(0,-12);var page_num=parseInt($this_a.closest(".tab-content").children(".page_num").val());if($this_a.hasClass("next")){ajax_loadTabContent(tab_name,page_num+1,$this,args)}else{$this.find("#"+tab_name+"-tab-content").data("loaded",0);ajax_loadTabContent(tab_name,page_num-1,$this,args)}});$this.find(".ajax-tabs a").first().click()})});function begin_tabs_loadTabContent(tab_name,page_num,container,args_obj){var container=jQuery(container);var tab_content=container.find("#"+tab_name+"-tab-content");var isLoaded=tab_content.data("loaded");if(!isLoaded||page_num!=1){if(!container.hasClass("tabs-loading")){container.addClass("tabs-loading");tab_content.load(ajax_tab.ajax_url,{action:"begin-tabs-content",tab:tab_name,page:page_num,args:args_obj},function(){container.removeClass("tabs-loading");tab_content.data("loaded",1).hide().fadeIn().siblings().hide()})}}else{tab_content.fadeIn().siblings().hide()}}jQuery(document).ready(function(){jQuery(".begin-tabs-content").each(function(){var $this=jQuery(this);var widget_id=this.id;var args=$this.data("args");$this.find(".begin-tabs a").click(function(e){e.preventDefault();jQuery(this).parent().addClass("selected").siblings().removeClass("selected");var tab_name=this.id.slice(0,-4);begin_tabs_loadTabContent(tab_name,1,$this,args)});$this.on("click",".tab-pagination a",function(e){e.preventDefault();var $this_a=jQuery(this);var tab_name=$this_a.closest(".tab-content").attr("id").slice(0,-12);var page_num=parseInt($this_a.closest(".tab-content").children(".page_num").val());if($this_a.hasClass("next")){begin_tabs_loadTabContent(tab_name,page_num+1,$this,args)}else{$this.find("#"+tab_name+"-tab-content").data("loaded",0);begin_tabs_loadTabContent(tab_name,page_num-1,$this,args)}});$this.find(".begin-tabs a").first().click()})});function group_tabs_loadTabContent(tab_name,page_num,container,args_obj){var container=jQuery(container);var tab_content=container.find("#"+tab_name+"-tab-content");var isLoaded=tab_content.data("loaded");if(!isLoaded||page_num!=1){if(!container.hasClass("group-loading")){container.addClass("group-loading");tab_content.load(ajax_tab.ajax_url,{action:"group-tabs-content",tab:tab_name,page:page_num,args:args_obj},function(){container.removeClass("group-loading");tab_content.data("loaded",1).hide().fadeIn().siblings().hide()})}}else{tab_content.fadeIn().siblings().hide()}}jQuery(document).ready(function(){jQuery(".group-tabs-content").each(function(){var $this=jQuery(this);var widget_id=this.id;var args=$this.data("args");$this.find(".group-tabs a").click(function(e){e.preventDefault();jQuery(this).parent().addClass("selected").siblings().removeClass("selected");var tab_name=this.id.slice(0,-4);group_tabs_loadTabContent(tab_name,1,$this,args)});$this.on("click",".tab-pagination a",function(e){e.preventDefault();var $this_a=jQuery(this);var tab_name=$this_a.closest(".tab-content").attr("id").slice(0,-12);var page_num=parseInt($this_a.closest(".tab-content").children(".page_num").val());if($this_a.hasClass("next")){group_tabs_loadTabContent(tab_name,page_num+1,$this,args)}else{$this.find("#"+tab_name+"-tab-content").data("loaded",0);group_tabs_loadTabContent(tab_name,page_num-1,$this,args)}});$this.find(".group-tabs a").first().click()})});