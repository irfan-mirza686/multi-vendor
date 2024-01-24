/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!********************************************************!*\
  !*** ./resources/assets/js/appointment/appointment.js ***!
  \********************************************************/


var tableName = '#attributeTable';
$(document).ready(function () {
  var tbl = $(tableName).DataTable({
    processing: true,
    serverSide: true,
    'order': [[4, 'desc']],
    ajax: {
      url: 'admin/GPC/attributes'
    },
    columnDefs: [{
      'targets': [4, 5, 6],
      'className': 'text-nowrap'
    }],
    columns: [{
      data: 'attribute_code',
      name: 'attribute_code'
    }, {
      data: 'attribute_title',
      name: 'attribute_title'
    }]
  });
  handleSearchDatatable(tbl);
});
/******/ })()
;