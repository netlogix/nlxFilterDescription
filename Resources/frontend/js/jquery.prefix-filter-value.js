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

            if (typeof filterPrefixList === 'undefined') {
                return;
            }
            // filterPrefixList is a global variable
            this.opts.filtersIdToBePrefix = filterPrefixList;
            me.$filterForm = $(me.opts.filterFormSelector);
            me.$filterComponents = me.$filterForm.find(me.opts.filterComponentSelector);

            me.assignFiltersName();
            me.onUpdateActiveFilterElement();
            me.onCreateActiveFilterElement();
        },

        assignFiltersName: function () {
            var me = this;
            $.each(me.$filterComponents, function (index, filterSelector) {
                $.each(me.opts.filtersIdToBePrefix, function (index, filterId) {
                    var filterData = $(filterSelector).data('field-name');
                    if (filterData !== filterId) {
                        return;
                    }
                    me.assign(filterSelector, filterId);
                })

            })
        },

        assign: function (filterSelector, filterId) {
            var me = this,
                labelText = $(filterSelector).find('label[for='+  filterId  +']').text(),
                filterIndex = filterId + '_' + labelText;

            me.opts.filtersName[filterIndex] = {text: $.trim(labelText), names: []};

            $(filterSelector).find('input').each(function () {
                var filterName = $(this).attr('name');

                if (null != filterName) {
                    me.opts.filtersName[filterIndex]['names'].push(filterName);
                }
            });
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
            $.each(this.opts.filtersName, function (index, filterData) {
                if ($.inArray(param, filterData['names']) === -1) {
                    return;
                }
                data.activeFilterElements[param].html(data.getLabelIcon() + filterData['text'] + ': ' + label);
            })
        },
    });
    window.StateManager.addPlugin('body', 'prefixFilterValue');
})(jQuery, window);
