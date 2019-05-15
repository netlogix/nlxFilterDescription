;(function ($, window) {
    $.plugin('prefixFilterValue', {
        //Die Idee war hier bei dem Event onCreateActiveFilter den Aktiven Filter Element zu erstellen.
        defaults: {
            currentForm: '',
        },

        init: function () {
            this.assignCurrentForm();
            this.setFilterPrefix();
            console.log(this.opts.currentForm, 'CurrentForm');
            console.log($.trim(this.opts.currentForm), 'CurrentForm2');
        },

        assignCurrentForm: function () {
            var me = this;
            $.subscribe('plugin/swListingActions/onComponentChange', function (plugin, data, event) {
                var fieldName = $(event.currentTarget).data('fieldName');
                me.opts.currentForm = $.trim($('label[for='+  fieldName  +']').text());
                console.log('first!');
            });
        },

        //Die Idee war hier bei diesem Event den Aktiven Filter Element zu erstellen und die Filter Bezeichnung
        // aus 'currentForm' zu benutzen. Leider funktioniert es nicht durch die Reihenfolge wie die aufgerufen werden.
        setFilterPrefix: function () {
            var me = this;
            $.subscribe('plugin/swListingActions/onCreateActiveFilter', function (plugin, data, param, value) {
                console.log('second!');
            });
        }
    });
    window.StateManager.addPlugin('body', 'prefixFilterValue');
})(jQuery, window);
