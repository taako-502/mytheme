/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/arrayLikeToArray.js ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _arrayLikeToArray(arr, len) {
  if (len == null || len > arr.length) len = arr.length;

  for (var i = 0, arr2 = new Array(len); i < len; i++) {
    arr2[i] = arr[i];
  }

  return arr2;
}

module.exports = _arrayLikeToArray;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/arrayWithHoles.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/arrayWithHoles.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _arrayWithHoles(arr) {
  if (Array.isArray(arr)) return arr;
}

module.exports = _arrayWithHoles;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayLikeToArray = __webpack_require__(/*! ./arrayLikeToArray */ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js");

function _arrayWithoutHoles(arr) {
  if (Array.isArray(arr)) return arrayLikeToArray(arr);
}

module.exports = _arrayWithoutHoles;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/extends.js":
/*!********************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/extends.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _extends() {
  module.exports = _extends = Object.assign || function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];

      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }

    return target;
  };

  return _extends.apply(this, arguments);
}

module.exports = _extends;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/iterableToArray.js":
/*!****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/iterableToArray.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _iterableToArray(iter) {
  if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter);
}

module.exports = _iterableToArray;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/iterableToArrayLimit.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/iterableToArrayLimit.js ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _iterableToArrayLimit(arr, i) {
  if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return;
  var _arr = [];
  var _n = true;
  var _d = false;
  var _e = undefined;

  try {
    for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) {
      _arr.push(_s.value);

      if (i && _arr.length === i) break;
    }
  } catch (err) {
    _d = true;
    _e = err;
  } finally {
    try {
      if (!_n && _i["return"] != null) _i["return"]();
    } finally {
      if (_d) throw _e;
    }
  }

  return _arr;
}

module.exports = _iterableToArrayLimit;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/nonIterableRest.js":
/*!****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/nonIterableRest.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

module.exports = _nonIterableRest;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/nonIterableSpread.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/nonIterableSpread.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

module.exports = _nonIterableSpread;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/slicedToArray.js":
/*!**************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/slicedToArray.js ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayWithHoles = __webpack_require__(/*! ./arrayWithHoles */ "./node_modules/@babel/runtime/helpers/arrayWithHoles.js");

var iterableToArrayLimit = __webpack_require__(/*! ./iterableToArrayLimit */ "./node_modules/@babel/runtime/helpers/iterableToArrayLimit.js");

var unsupportedIterableToArray = __webpack_require__(/*! ./unsupportedIterableToArray */ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js");

var nonIterableRest = __webpack_require__(/*! ./nonIterableRest */ "./node_modules/@babel/runtime/helpers/nonIterableRest.js");

function _slicedToArray(arr, i) {
  return arrayWithHoles(arr) || iterableToArrayLimit(arr, i) || unsupportedIterableToArray(arr, i) || nonIterableRest();
}

module.exports = _slicedToArray;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/toConsumableArray.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/toConsumableArray.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayWithoutHoles = __webpack_require__(/*! ./arrayWithoutHoles */ "./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js");

var iterableToArray = __webpack_require__(/*! ./iterableToArray */ "./node_modules/@babel/runtime/helpers/iterableToArray.js");

var unsupportedIterableToArray = __webpack_require__(/*! ./unsupportedIterableToArray */ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js");

var nonIterableSpread = __webpack_require__(/*! ./nonIterableSpread */ "./node_modules/@babel/runtime/helpers/nonIterableSpread.js");

function _toConsumableArray(arr) {
  return arrayWithoutHoles(arr) || iterableToArray(arr) || unsupportedIterableToArray(arr) || nonIterableSpread();
}

module.exports = _toConsumableArray;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayLikeToArray = __webpack_require__(/*! ./arrayLikeToArray */ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js");

function _unsupportedIterableToArray(o, minLen) {
  if (!o) return;
  if (typeof o === "string") return arrayLikeToArray(o, minLen);
  var n = Object.prototype.toString.call(o).slice(8, -1);
  if (n === "Object" && o.constructor) n = o.constructor.name;
  if (n === "Map" || n === "Set") return Array.from(o);
  if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return arrayLikeToArray(o, minLen);
}

module.exports = _unsupportedIterableToArray;

/***/ }),

/***/ "./src/block/core-heading.js":
/*!***********************************!*\
  !*** ./src/block/core-heading.js ***!
  \***********************************/
/*! exports provided: addBlockControl, addAttribute, addSaveProps */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addBlockControl", function() { return addBlockControl; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addAttribute", function() { return addAttribute; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addSaveProps", function() { return addSaveProps; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);


/**
 * 見出ブロックの拡張
 *
 * @package mytheme
 */

var _lodash = lodash,
    assign = _lodash.assign;
var __ = wp.i18n.__;
var Fragment = wp.element.Fragment;
var addFilter = wp.hooks.addFilter;
var InspectorControls = window.wp.editor.InspectorControls;
var createHigherOrderComponent = wp.compose.createHigherOrderComponent;

var isValidBlockType = function isValidBlockType(name) {
  var validBlockTypes = ['core/heading'];
  return validBlockTypes.includes(name);
};
/**
 * editコンポーネントを変更する
 * @see addFilter('editor.BlockEdit',$namespace,$func)
 * @link https://developer.wordpress.org/block-editor/reference-guides/filters/block-filters/#editor-blockedit
 */


var addBlockControl = createHigherOrderComponent(function (BlockEdit) {
  return function (props) {
    // isValidBlockType で指定したブロックが選択されたら表示
    if (isValidBlockType(props.name) && props.isSelected) {
      // すでにオプション選択されていたら
      var selectOption = props.attributes.headingBorderSetting || '';
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(BlockEdit, props), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InspectorControls, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["PanelBody"], {
        title: "\u30DC\u30FC\u30C0\u30FC\u306E\u8A2D\u5B9A",
        initialOpen: false,
        className: "p-settings-heading__border"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["RadioControl"], {
        selected: selectOption,
        options: [{
          label: '非表示',
          value: 'p-heading-border-none'
        }, {
          label: '左に線を引く',
          value: 'p-heading-border-left'
        }, {
          label: '下に線を引く',
          value: 'p-heading-border-bottom'
        } //{ label: '下に線を引く（ツートンカラー）', value: 'mb-lg' },
        ],
        onChange: function onChange(changeOption) {
          var newClassName = changeOption; // 高度な設定で入力している場合は追加する

          if (props.attributes.className) {
            // 付与されているclassを取り出す
            var inputClassName = props.attributes.className; // スペース区切りを配列に

            inputClassName = inputClassName.split(' '); // 選択されていたオプションの値を削除

            var filterClassName = inputClassName.filter(function (name) {
              return name !== selectOption;
            }); // 新しく選択したオプションを追加

            filterClassName.push(changeOption); // 配列を文字列に

            newClassName = filterClassName.join(' ');
          }

          selectOption = changeOption;
          props.setAttributes({
            className: newClassName,
            headingBorderSetting: changeOption
          });
        }
      })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__["RangeControl"], {
        label: "\u30DC\u30FC\u30C0\u30FC\u3068\u898B\u51FA\u3057\u306E\u8DDD\u96E2\uFF08em\uFF09",
        value: props.attributes.headingBorderPaddingSetting,
        min: 0,
        max: 3,
        step: 0.05,
        initialPosition: 0.1,
        allowReset: true,
        onChange: function onChange(distance) {
          props.setAttributes({
            headingBorderPaddingSetting: distance
          });
        }
      })));
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(BlockEdit, props);
  };
}, 'addMyCustomBlockControls');
addFilter('editor.BlockEdit', 'myblock/block-control', addBlockControl);
/**
 * ブロック設定をフィルタリングする
 * @see addFilter('blocks.registerBlockType',$namespace,$func)
 * @link https://developer.wordpress.org/block-editor/reference-guides/filters/block-filters/#blocks-registerblocktype
 */

function addAttribute(settings) {
  if (isValidBlockType(settings.name)) {
    settings.attributes = assign(settings.attributes, {
      headingBorderSetting: {
        type: 'string',
        default: 'p-heading-border-none'
      },
      headingBorderPaddingSetting: {
        type: 'integer',
        default: '0.1'
      }
    });
  }

  return settings;
}
addFilter('blocks.registerBlockType', 'myblock/add-attr', addAttribute);
/**
 * save関数のルート要素にプロパティ要素（classやid、styleなど）を追加する
 * @param object   props      プロパティ
 * @param object   blockType  ブロックのタイプ
 * @param object   attributes 属性
 * @see addFilter('blocks.getSaveContent.extraProps',$namespace,$func)
 * @link https://developer.wordpress.org/block-editor/reference-guides/filters/block-filters/#blocks-getsavecontent-extraprops
 */

function addSaveProps(props, blockType, attributes) {
  var headingBorderSetting = attributes.headingBorderSetting;

  if (isValidBlockType(blockType.name)) {
    // なしを選択した場合はheadingBorderSetting削除
    if (headingBorderSetting === '') {
      delete attributes.headingBorderSetting;
    }
  } //スタイルシートの設定


  var headingBorderPaddingSetting = attributes.headingBorderPaddingSetting;

  if ('p-heading-border-left' === headingBorderSetting) {
    props = lodash.assign(props, {
      style: {
        paddingLeft: headingBorderPaddingSetting + "em"
      }
    });
  } else if ('p-heading-border-bottom' === headingBorderSetting) {
    props = lodash.assign(props, {
      style: {
        paddingBottom: headingBorderPaddingSetting + "em"
      }
    });
  }

  return props;
}
addFilter('blocks.getSaveContent.extraProps', 'myblock/add-props', addSaveProps);

/***/ }),

/***/ "./src/block/custom-blogcard.js":
/*!**************************************!*\
  !*** ./src/block/custom-blogcard.js ***!
  \**************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__);



/**
 * 最新の投稿のリンクを表示するブロック
 * @param  {[type]} gutenberg [description]
 * @param  {[type]} title     [description]
 * @param  {[type]} icon      [description]
 * @param  {[type]} category  [description]
 * @param  {[type]} edit      [description]
 * @param  {[type]} posts     [description]
 * @return {[type]}           [description]
 */

Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])('custom/blogcard', {
  title: 'Blog Card',
  icon: 'megaphone',
  category: 'widgets',
  keywords: ['blogcard', 'link', 'card'],
  attributes: {
    url_blogcard: {
      type: 'string',
      default: '',
      selector: 'div.p-blogcard__url'
    }
  },
  edit: function edit(_ref) {
    var className = _ref.className,
        setAttributes = _ref.setAttributes,
        attributes = _ref.attributes;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      class: "p-blogcard__editor"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, "\u5185\u90E8\u30EA\u30F3\u30AF\u306EURL\u3092\u5165\u529B\u3057\u3066\u304F\u3060\u3055\u3044"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["RichText"], {
      tagName: "div",
      className: "p-blogcard__url",
      onChange: function onChange(url_blogcard) {
        return setAttributes({
          url_blogcard: url_blogcard
        });
      },
      value: attributes.url_blogcard
    }));
  },
  save: function save(_ref2) {
    var attributes = _ref2.attributes;
    return null;
  }
});

/***/ }),

/***/ "./src/block/custom-box.js":
/*!*********************************!*\
  !*** ./src/block/custom-box.js ***!
  \*********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/extends.js");
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__);



/**
 * boxブロック
 *
 * @package mytheme
 */





/**
 * ボックスブロック追加
 * @type {String}
 */

Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__["registerBlockType"])('custom/box', {
  title: 'box',
  description: 'ボックスレイアウトです。',
  icon: 'admin-page',
  category: 'layout',
  keywords: ['box'],
  attributes: {
    content: {
      //type: 'string',
      source: 'html',
      selector: 'p'
    },
    //カラーピッカー用
    color: {
      type: 'string',
      default: '#FFFFFF'
    }
  },
  edit: function edit(_ref) {
    var className = _ref.className,
        setAttributes = _ref.setAttributes,
        attributes = _ref.attributes;
    var blockProps = Object(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["useBlockProps"])({
      className: "".concat(className) //style: {{ background: attributes.color }},

    });
    var colors = [{
      name: 'red',
      color: '#f00'
    }, {
      name: 'white',
      color: '#fff'
    }, {
      name: 'blue',
      color: '#00f'
    }];
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(React.Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_5__["InspectorControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__["PanelBody"], {
      title: "\u80CC\u666F\u8272",
      initialOpen: true
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__["ColorPalette"], {
      colors: [{
        name: 'white',
        color: '#fff '
      }, {
        name: 'orange',
        color: '#f0bc68'
      }, {
        name: 'green',
        color: '#c4d7d1 '
      }, {
        name: 'blue',
        color: '#dde1f8 '
      }],
      value: attributes.color,
      onChange: function onChange(color) {
        return setAttributes({
          color: color
        });
      }
    })))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({}, blockProps, {
      style: {
        background: attributes.color
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["InnerBlocks"], null)));
  },
  save: function save(_ref2) {
    var attributes = _ref2.attributes;
    var blockProps = _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["useBlockProps"].save();
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({}, blockProps, {
      style: {
        background: attributes.color
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__["InnerBlocks"].Content, null));
  }
});

/***/ }),

/***/ "./src/block/custom-core.js":
/*!**********************************!*\
  !*** ./src/block/custom-core.js ***!
  \**********************************/
/*! exports provided: addBlockControl, addAttribute, addSaveProps */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addBlockControl", function() { return addBlockControl; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addAttribute", function() { return addAttribute; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addSaveProps", function() { return addSaveProps; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);


/**
 * coreブロックの拡張
 *
 * @package mytheme
 */
var _lodash = lodash,
    assign = _lodash.assign;
var __ = wp.i18n.__;
var Fragment = wp.element.Fragment;
var addFilter = wp.hooks.addFilter;
var _wp$components = wp.components,
    PanelBody = _wp$components.PanelBody,
    RadioControl = _wp$components.RadioControl;
var InspectorControls = window.wp.editor.InspectorControls;
var createHigherOrderComponent = wp.compose.createHigherOrderComponent;

var isValidBlockType = function isValidBlockType(name) {
  var validBlockTypes = ['core/paragraph', // 段落
  'core/list', // リスト
  'core/image' // イメージ
  ];
  return validBlockTypes.includes(name);
};

var addBlockControl = createHigherOrderComponent(function (BlockEdit) {
  return function (props) {
    // isValidBlockType で指定したブロックが選択されたら表示
    if (isValidBlockType(props.name) && props.isSelected) {
      // すでにオプション選択されていたら
      var selectOption = props.attributes.marginSetting || '';
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(BlockEdit, props), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InspectorControls, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelBody, {
        title: "\u30DE\u30FC\u30B8\u30F3\u8A2D\u5B9A",
        initialOpen: false,
        className: "margin-controle"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(RadioControl, {
        selected: selectOption,
        options: [{
          label: 'なし',
          value: ''
        }, {
          label: '小',
          value: 'mb-sm'
        }, {
          label: '中',
          value: 'mb-md'
        }, {
          label: '大',
          value: 'mb-lg'
        }],
        onChange: function onChange(changeOption) {
          var newClassName = changeOption; // 高度な設定で入力している場合は追加する

          if (props.attributes.className) {
            // 付与されているclassを取り出す
            var inputClassName = props.attributes.className; // スペース区切りを配列に

            inputClassName = inputClassName.split(' '); // 選択されていたオプションの値を削除

            var filterClassName = inputClassName.filter(function (name) {
              return name !== selectOption;
            }); // 新しく選択したオプションを追加

            filterClassName.push(changeOption); // 配列を文字列に

            newClassName = filterClassName.join(' ');
          }

          selectOption = changeOption;
          props.setAttributes({
            className: newClassName,
            marginSetting: changeOption
          });
        }
      }))));
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(BlockEdit, props);
  };
}, 'addMyCustomBlockControls');
addFilter('editor.BlockEdit', 'myblock/block-control', addBlockControl);
function addAttribute(settings) {
  if (isValidBlockType(settings.name)) {
    settings.attributes = assign(settings.attributes, {
      marginSetting: {
        type: 'string'
      }
    });
  }

  return settings;
}
addFilter('blocks.registerBlockType', 'myblock/add-attr', addAttribute);
function addSaveProps(extraProps, blockType, attributes) {
  if (isValidBlockType(blockType.name)) {
    // なしを選択した場合はmarginSetting削除
    if (attributes.marginSetting === '') {
      delete attributes.marginSetting;
    }
  }

  return extraProps;
}
addFilter('blocks.getSaveContent.extraProps', 'myblock/add-props', addSaveProps);

/***/ }),

/***/ "./src/block/custom-innerblock.js":
/*!****************************************!*\
  !*** ./src/block/custom-innerblock.js ***!
  \****************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);


/**
 * インナーブロック
 *
 * @package mytheme
 */


Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])('custom/innerblocks', {
  title: 'innerblocks',
  description: 'インナーブロックです。',
  icon: 'admin-page',
  category: 'layout',
  keywords: ['inner'],
  edit: function edit() {
    var blockProps = Object(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["useBlockProps"])();
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", blockProps, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["InnerBlocks"], null));
  },
  save: function save() {
    var blockProps = _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["useBlockProps"].save();
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", blockProps, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__["InnerBlocks"].Content, null));
  }
});

/***/ }),

/***/ "./src/block/custom-lastpost.js":
/*!**************************************!*\
  !*** ./src/block/custom-lastpost.js ***!
  \**************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__);


/**
 * 最新の記事ブロック
 *
 * @package mytheme
 */


/**
 * 最新の投稿のリンクを表示するブロック
 * @param  {[type]} gutenberg [description]
 * @param  {[type]} title     [description]
 * @param  {[type]} icon      [description]
 * @param  {[type]} category  [description]
 * @param  {[type]} edit      [description]
 * @param  {[type]} posts     [description]
 * @return {[type]}           [description]
 */

Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])('custom/last-post', {
  title: 'Last Post',
  icon: 'megaphone',
  category: 'widgets',
  keywords: ['last', 'post', 'last-post'],
  edit: Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_2__["withSelect"])(function (select) {
    return {
      posts: select('core').getEntityRecords('postType', 'post')
    };
  })(function (_ref) {
    var posts = _ref.posts,
        className = _ref.className;

    if (!posts) {
      return 'Loading...';
    }

    if (posts && posts.length === 0) {
      return 'No posts';
    }

    var post = posts[0];
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("a", {
      className: className,
      href: post.link
    }, post.title.rendered);
  })
});

/***/ }),

/***/ "./src/block/custom-speechballoon.js":
/*!*******************************************!*\
  !*** ./src/block/custom-speechballoon.js ***!
  \*******************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5__);


/**
 * ふきだしブロック
 *
 * @package mytheme
 */






/**
 * ボックスブロック追加
 * @type {String}
 */

Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])('custom/speechballoon', {
  title: 'Speech Balloons',
  description: 'ふきだしです。',
  icon: 'testimonial',
  category: 'layout',
  keywords: ['speechballoon', 'speechbubbles', 'speech', 'balloon', 'bubbles'],
  attributes: {
    speech: {
      source: 'html',
      selector: 'p.p-balloon__speech'
    },
    name: {
      source: 'html',
      selector: 'p.p-balloon__name'
    },
    //MediaUpload の value の値
    mediaID: {
      type: 'number',
      default: 0
    },
    //img の src に指定する URL
    imageUrl: {
      type: 'string',
      source: 'attribute',
      attribute: 'src',
      selector: '.p-balloon__img'
    },
    //img の alt 属性の値
    imageAlt: {
      type: 'string',
      source: 'attribute',
      attribute: 'alt',
      selector: '.p-balloon__img'
    }
  },
  edit: function edit(props) {
    //分割代入を使って props 経由でプロパティを変数に代入
    var className = props.className,
        attributes = props.attributes,
        setAttributes = props.setAttributes; //選択された画像の情報（alt 属性、URL、ID）を更新する関数

    var onSelectImage = function onSelectImage(media) {
      setAttributes({
        imageAlt: media.alt,
        imageUrl: media.url,
        mediaID: media.id
      });
    }; //メディアライブラリを開くボタンをレンダリングする関数


    var getImageButton = function getImageButton(open) {
      if (attributes.imageUrl) {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
          src: attributes.imageUrl,
          onClick: open,
          className: "p-balloon__img",
          alt: ""
        });
      } else {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
          className: "button-container"
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
          onClick: open,
          className: "p-balloon__btn"
        }, "\u753B\u50CF\u3092\u30A2\u30C3\u30D7\u30ED\u30FC\u30C9"));
      }
    }; //画像を削除する（メディアをリセットする）関数


    var removeMedia = function removeMedia() {
      setAttributes({
        mediaID: 0,
        imageUrl: '',
        imageAlt: ''
      });
    };

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      class: "p-balloon"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      class: "p-balloon__people"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5__["MediaUpload"], {
      onSelect: onSelectImage,
      allowedTypes: ['image'],
      value: attributes.mediaID,
      render: function render(_ref) {
        var open = _ref.open;
        return getImageButton(open);
      }
    })), attributes.mediaID != 0 && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5__["MediaUploadCheck"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
      onClick: removeMedia,
      isLink: true,
      isDestructive: true,
      className: "removeImage"
    }, "\u753B\u50CF\u3092\u524A\u9664")), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["RichText"], {
      tagName: "p",
      className: "p-balloon__name",
      default: "name",
      onChange: function onChange(name) {
        return setAttributes({
          name: name
        });
      },
      value: attributes.name
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      class: "p-balloon__balloon"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      class: "p-balloon__tail"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", null)), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["RichText"], {
      tagName: "p",
      className: "p-balloon__speech",
      onChange: function onChange(speech) {
        return setAttributes({
          speech: speech
        });
      },
      value: attributes.speech
    })));
  },
  save: function save(_ref2) {
    var attributes = _ref2.attributes;

    //画像をレンダリングする関数
    var getImagesSave = function getImagesSave(src, alt) {
      if (!src) return null;

      if (alt) {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
          className: "p-balloon__img",
          src: src,
          alt: alt
        });
      }

      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
        className: "p-balloon__img",
        src: src,
        alt: "",
        "aria-hidden": "true"
      });
    };

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      class: "p-balloon"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      class: "p-balloon__people"
    }, getImagesSave(attributes.imageUrl, attributes.imageAlt), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["RichText"].Content, {
      tagName: "p",
      className: "p-balloon__name",
      value: attributes.name
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      class: "p-balloon__balloon"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      class: "p-balloon__tail"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", null)), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["RichText"].Content, {
      tagName: "p",
      className: "p-balloon__speech",
      value: attributes.speech
    })));
  }
});

/***/ }),

/***/ "./src/components/index.js":
/*!*********************************!*\
  !*** ./src/components/index.js ***!
  \*********************************/
/*! exports provided: MyDropdown, MyDropdownControls */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _my_dropdown__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./my-dropdown */ "./src/components/my-dropdown.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "MyDropdown", function() { return _my_dropdown__WEBPACK_IMPORTED_MODULE_0__["default"]; });

/* harmony import */ var _my_dropdown_controls__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./my-dropdown-controls */ "./src/components/my-dropdown-controls.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "MyDropdownControls", function() { return _my_dropdown_controls__WEBPACK_IMPORTED_MODULE_1__["default"]; });





/***/ }),

/***/ "./src/components/my-dropdown-controls.js":
/*!************************************************!*\
  !*** ./src/components/my-dropdown-controls.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var createSlotFill = wp.components.createSlotFill;

var _createSlotFill = createSlotFill('MyDropdownControls'),
    Fill = _createSlotFill.Fill,
    Slot = _createSlotFill.Slot;

var MyDropdownControls = Fill;
MyDropdownControls.Slot = Slot;
/* harmony default export */ __webpack_exports__["default"] = (MyDropdownControls);

/***/ }),

/***/ "./src/components/my-dropdown.js":
/*!***************************************!*\
  !*** ./src/components/my-dropdown.js ***!
  \***************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _my_dropdown_controls__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./my-dropdown-controls */ "./src/components/my-dropdown-controls.js");


var BlockFormatControls = wp.editor.BlockFormatControls;
var _wp$components = wp.components,
    Toolbar = _wp$components.Toolbar,
    DropdownMenu = _wp$components.DropdownMenu;


var MyDropdown = function MyDropdown() {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(BlockFormatControls, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "editor-format-toolbar block-editor-format-toolbar"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(Toolbar, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_my_dropdown_controls__WEBPACK_IMPORTED_MODULE_2__["default"].Slot, null, function (fills) {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(DropdownMenu, {
      icon: "admin-customizer",
      position: "bottom left",
      label: "\u30D5\u30A9\u30F3\u30C8",
      controls: fills.map(function (_ref) {
        var _ref2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_ref, 1),
            props = _ref2[0].props;

        return props;
      })
    });
  }))));
};

/* harmony default export */ __webpack_exports__["default"] = (MyDropdown);

/***/ }),

/***/ "./src/constant.js":
/*!*************************!*\
  !*** ./src/constant.js ***!
  \*************************/
/*! exports provided: PLUGIN_NAME */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PLUGIN_NAME", function() { return PLUGIN_NAME; });
var PLUGIN_NAME = 'my-dropdown';

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _block_custom_lastpost_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./block/custom-lastpost.js */ "./src/block/custom-lastpost.js");
/* harmony import */ var _block_custom_blogcard_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./block/custom-blogcard.js */ "./src/block/custom-blogcard.js");
/* harmony import */ var _block_custom_speechballoon_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./block/custom-speechballoon.js */ "./src/block/custom-speechballoon.js");
/* harmony import */ var _block_custom_innerblock_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./block/custom-innerblock.js */ "./src/block/custom-innerblock.js");
/* harmony import */ var _block_custom_box_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./block/custom-box.js */ "./src/block/custom-box.js");
/* harmony import */ var _block_custom_core_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./block/custom-core.js */ "./src/block/custom-core.js");
/* harmony import */ var _block_core_heading_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./block/core-heading.js */ "./src/block/core-heading.js");
/* harmony import */ var _toolbar_custom_font_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./toolbar/custom-font.js */ "./src/toolbar/custom-font.js");
/**
 * Gutenberg Blocks
 *
 * @package mytheme
 */

/* オリジナルブロック */






/* コアブロックの拡張 */
//見出し


/* リッチツールバー */
//フォント



/***/ }),

/***/ "./src/toolbar/custom-font.js":
/*!************************************!*\
  !*** ./src/toolbar/custom-font.js ***!
  \************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./../utils */ "./src/utils/index.js");


/* リッチテキストエディタ */
var registerFormatType = wp.richText.registerFormatType;


[{
  name: 'メイリオ',
  className: 'meirio',
  create: _utils__WEBPACK_IMPORTED_MODULE_2__["createToolbarButton"]
}, {
  name: '游ゴシック',
  className: 'yu-gothic',
  create: _utils__WEBPACK_IMPORTED_MODULE_2__["createToolbarButton"]
}, {
  name: '游明朝',
  className: 'yu-mincho',
  create: _utils__WEBPACK_IMPORTED_MODULE_2__["createToolbarButton"]
}].forEach(function (_ref, index) {
  var name = _ref.name,
      className = _ref.className,
      create = _ref.create,
      _ref$setting = _ref.setting,
      setting = _ref$setting === void 0 ? {} : _ref$setting;
  return registerFormatType.apply(void 0, _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(Object(_utils__WEBPACK_IMPORTED_MODULE_2__["getRichTextSetting"])({
    name: name,
    className: className,
    create: create,
    setting: setting
  }, index)));
});

/***/ }),

/***/ "./src/utils/index.js":
/*!****************************!*\
  !*** ./src/utils/index.js ***!
  \****************************/
/*! exports provided: createToolbarButton, getRichTextSetting */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _toolbar_button__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./toolbar-button */ "./src/utils/toolbar-button.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "createToolbarButton", function() { return _toolbar_button__WEBPACK_IMPORTED_MODULE_0__["createToolbarButton"]; });

/* harmony import */ var _rich_text__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./rich-text */ "./src/utils/rich-text.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "getRichTextSetting", function() { return _rich_text__WEBPACK_IMPORTED_MODULE_1__["getRichTextSetting"]; });




/***/ }),

/***/ "./src/utils/rich-text.js":
/*!********************************!*\
  !*** ./src/utils/rich-text.js ***!
  \********************************/
/*! exports provided: getRichTextSetting */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getRichTextSetting", function() { return getRichTextSetting; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _constant__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../constant */ "./src/constant.js");
/* harmony import */ var _components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../components */ "./src/components/index.js");

var Fragment = wp.element.Fragment;


/**
 * @param {string} name name
 * @param {number} index index
 * @param {function} create create component function
 * @param {object} setting setting
 * @returns {array} setting
 */

var getRichTextSetting = function getRichTextSetting(_ref, index) {
  var name = _ref.name,
      className = _ref.className,
      create = _ref.create,
      _ref$setting = _ref.setting,
      setting = _ref$setting === void 0 ? {} : _ref$setting;
  var formatName = _constant__WEBPACK_IMPORTED_MODULE_1__["PLUGIN_NAME"] + '/' + className;

  var component = function component(args) {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_components__WEBPACK_IMPORTED_MODULE_2__["MyDropdownControls"], null, create({
      args: args,
      name: name,
      className: className,
      formatName: formatName
    }));
  };

  setting.title = setting.title || name;
  setting.tagName = setting.tagName || 'span';
  setting.className = setting.className || className;

  setting.edit = function (args) {
    if (!index) {
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Fragment, null, component(args), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_components__WEBPACK_IMPORTED_MODULE_2__["MyDropdown"], null));
    }

    return component(args);
  };

  return [formatName, setting];
};

/***/ }),

/***/ "./src/utils/toolbar-button.js":
/*!*************************************!*\
  !*** ./src/utils/toolbar-button.js ***!
  \*************************************/
/*! exports provided: createToolbarButton */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "createToolbarButton", function() { return createToolbarButton; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

var toggleFormat = wp.richText.toggleFormat;
var ToolbarButton = wp.components.ToolbarButton;
/**
 * @param {object} args args
 * @param {string} name name
 * @param {string} formatName format name
 * @returns {{onClick: onClick, icon: *, title: *, isActive: boolean}} toolbar button properties
 */

var getToolbarButtonProps = function getToolbarButtonProps(_ref) {
  var args = _ref.args,
      name = _ref.name,
      formatName = _ref.formatName;
  return {
    icon: 'admin-customizer',
    title: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: name
    }, name),
    onClick: function onClick() {
      args.onChange(toggleFormat(args.value, {
        type: formatName
      }));
    },
    isActive: args.isActive
  };
};
/**
 * @param {object} args args
 * @param {string} name name
 * @param {string} formatName format name
 * @returns {*} toolbar button
 */


var createToolbarButton = function createToolbarButton(_ref2) {
  var args = _ref2.args,
      name = _ref2.name,
      formatName = _ref2.formatName;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(ToolbarButton, getToolbarButtonProps({
    args: args,
    name: name,
    formatName: formatName
  }));
};

/***/ }),

/***/ "@wordpress/block-editor":
/*!**********************************************!*\
  !*** external {"this":["wp","blockEditor"]} ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["blockEditor"]; }());

/***/ }),

/***/ "@wordpress/blocks":
/*!*****************************************!*\
  !*** external {"this":["wp","blocks"]} ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["blocks"]; }());

/***/ }),

/***/ "@wordpress/components":
/*!*********************************************!*\
  !*** external {"this":["wp","components"]} ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["components"]; }());

/***/ }),

/***/ "@wordpress/data":
/*!***************************************!*\
  !*** external {"this":["wp","data"]} ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["data"]; }());

/***/ }),

/***/ "@wordpress/editor":
/*!*****************************************!*\
  !*** external {"this":["wp","editor"]} ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["editor"]; }());

/***/ }),

/***/ "@wordpress/element":
/*!******************************************!*\
  !*** external {"this":["wp","element"]} ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["element"]; }());

/***/ }),

/***/ "@wordpress/i18n":
/*!***************************************!*\
  !*** external {"this":["wp","i18n"]} ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["i18n"]; }());

/***/ })

/******/ });
//# sourceMappingURL=index.js.map