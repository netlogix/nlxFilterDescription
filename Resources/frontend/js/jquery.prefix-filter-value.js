;(function ($, window) {
    $.plugin('prefixFilterValue', {
        defaults: {
            fieldName: '',

            currentForm: '',

            filterFormSelector: '*[data-filter-form="true"]',

            filterComponentSelector: '*[data-filter-type]',

            filtersIdToBePrefix: [],

            filtersName: {},
        },

        init: function () {
            var me = this;
            me.$filterForm = $(me.opts.filterFormSelector);
            me.$filterComponents = me.$filterForm.find(me.opts.filterComponentSelector);
            // filterPrefixList is a global variable
            this.opts.filtersIdToBePrefix = filterPrefixList;
            me.assignFiltersName();
            me.onUpdateActiveFilterElement();
            me.onCreateActiveFilterElement();
        },

        assignFiltersName: function () {
            var me = this;
            $.each(me.$filterComponents, function (index, filterSelector) {
                $.each(me.opts.filtersIdToBePrefix, function (index, filterId) {
                    var filterData = $(filterSelector).data('field-name');
                    if (filterData === filterId) {
                        var labelText = $(filterSelector).find('label[for='+  filterId  +']').text();
                        me.opts.filtersName[filterId] = $.trim(labelText);
                    }
                })

            })
        },

        onUpdateActiveFilterElement: function () {
            var me = this;
            $.subscribe('plugin/swListingActions/onUpdateActiveFilterElement', function (plugin, data, param, label) {
                me.setFilterPrefix(data, param, label);
            });
        },

        onCreateActiveFilterElement: function () {
            var me = this;
            $.subscribe('plugin/swListingActions/onCreateActiveFilterElement', function (plugin, data, param, label) {
                me.setFilterPrefix(data, param, label);
            });
        },

        setFilterPrefix: function (data, param, label) {
            $.each(this.opts.filtersName, function (filterId, filterName) {
                if (param.indexOf(filterId) !== -1) {
                    data.activeFilterElements[param].html(data.getLabelIcon() + filterName + ': ' + label);
                }
            })
        },
    });
    window.StateManager.addPlugin('body', 'prefixFilterValue');
})(jQuery, window);
