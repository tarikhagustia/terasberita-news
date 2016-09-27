/*
 * Slim v1.1.1 - Image Cropping Made Easy
 * Copyright (c) 2016 Rik Schennink - http://slim.pqina.nl
 */
(function($,undefined){

    'use strict';

    // if no jquery, stop here
    if (!$) {return;}

    // library reference
    var Slim = function() {

/*
* JavaScript Load Image
* https://github.com/blueimp/JavaScript-Load-Image
*
* Copyright 2011, Sebastian Tschan
* https://blueimp.net
*
* Licensed under the MIT license:
* http://www.opensource.org/licenses/MIT
*/

/*global define, module, window, document, URL, webkitURL, FileReader */

// Loads an image for a given File object.
// Invokes the callback with an img or optional canvas
// element (if supported by the browser) as parameter:
var loadImage = function (file, callback, options) {
    var img = document.createElement('img')
    var url
    var oUrl
    img.onerror = callback
    img.onload = function () {
        if (oUrl && !(options && options.noRevoke)) {
            loadImage.revokeObjectURL(oUrl)
        }
        if (callback) {
            callback(loadImage.scale(img, options))
        }
    }
    if (loadImage.isInstanceOf('Blob', file) ||
        // Files are also Blob instances, but some browsers
        // (Firefox 3.6) support the File API but not Blobs:
        loadImage.isInstanceOf('File', file)) {
        url = oUrl = loadImage.createObjectURL(file)
        // Store the file type for resize processing:
        img._type = file.type
    } else if (typeof file === 'string') {
        url = file
        if (options && options.crossOrigin) {
            img.crossOrigin = options.crossOrigin
        }
    } else {
        return false
    }
    if (url) {
        img.src = url
        return img
    }
    return loadImage.readFile(file, function (e) {
        var target = e.target
        if (target && target.result) {
            img.src = target.result
        } else {
            if (callback) {
                callback(e)
            }
        }
    })
}
// The check for URL.revokeObjectURL fixes an issue with Opera 12,
// which provides URL.createObjectURL but doesn't properly implement it:
var urlAPI = (window.createObjectURL && window) ||
    (window.URL && URL.revokeObjectURL && URL) ||
    (window.webkitURL && webkitURL)

loadImage.isInstanceOf = function (type, obj) {
    // Cross-frame instanceof check
    return Object.prototype.toString.call(obj) === '[object ' + type + ']'
}

// Transform image coordinates, allows to override e.g.
// the canvas orientation based on the orientation option,
// gets canvas, options passed as arguments:
loadImage.transformCoordinates = function () {
    return
}

// Returns transformed options, allows to override e.g.
// maxWidth, maxHeight and crop options based on the aspectRatio.
// gets img, options passed as arguments:
loadImage.getTransformedOptions = function (img, options) {
    var aspectRatio = options.aspectRatio
    var newOptions
    var i
    var width
    var height
    if (!aspectRatio) {
        return options
    }
    newOptions = {}
    for (i in options) {
        if (options.hasOwnProperty(i)) {
            newOptions[i] = options[i]
        }
    }
    newOptions.crop = true
    width = img.naturalWidth || img.width
    height = img.naturalHeight || img.height
    if (width / height > aspectRatio) {
        newOptions.maxWidth = height * aspectRatio
        newOptions.maxHeight = height
    } else {
        newOptions.maxWidth = width
        newOptions.maxHeight = width / aspectRatio
    }
    return newOptions
}

// Canvas render method, allows to implement a different rendering algorithm:
loadImage.renderImageToCanvas = function (
    canvas,
    img,
    sourceX,
    sourceY,
    sourceWidth,
    sourceHeight,
    destX,
    destY,
    destWidth,
    destHeight
) {
    canvas.getContext('2d').drawImage(
        img,
        sourceX,
        sourceY,
        sourceWidth,
        sourceHeight,
        destX,
        destY,
        destWidth,
        destHeight
    )
    return canvas
}

// This method is used to determine if the target image
// should be a canvas element:
loadImage.hasCanvasOption = function (options) {
    return options.canvas || options.crop || !!options.aspectRatio
}

// Scales and/or crops the given image (img or canvas HTML element)
// using the given options.
// Returns a canvas object if the browser supports canvas
// and the hasCanvasOption method returns true or a canvas
// object is passed as image, else the scaled image:
loadImage.scale = function (img, options) {
    options = options || {}
    var canvas = document.createElement('canvas')
    var useCanvas = img.getContext ||
        (loadImage.hasCanvasOption(options) && canvas.getContext)
    var width = img.naturalWidth || img.width
    var height = img.naturalHeight || img.height
    var destWidth = width
    var destHeight = height
    var maxWidth
    var maxHeight
    var minWidth
    var minHeight
    var sourceWidth
    var sourceHeight
    var sourceX
    var sourceY
    var pixelRatio
    var downsamplingRatio
    var tmp
    function scaleUp () {
        var scale = Math.max(
            (minWidth || destWidth) / destWidth,
            (minHeight || destHeight) / destHeight
        )
        if (scale > 1) {
            destWidth *= scale
            destHeight *= scale
        }
    }
    function scaleDown () {
        var scale = Math.min(
            (maxWidth || destWidth) / destWidth,
            (maxHeight || destHeight) / destHeight
        )
        if (scale < 1) {
            destWidth *= scale
            destHeight *= scale
        }
    }
    if (useCanvas) {
        options = loadImage.getTransformedOptions(img, options)
        sourceX = options.left || 0
        sourceY = options.top || 0
        if (options.sourceWidth) {
            sourceWidth = options.sourceWidth
            if (options.right !== undefined && options.left === undefined) {
                sourceX = width - sourceWidth - options.right
            }
        } else {
            sourceWidth = width - sourceX - (options.right || 0)
        }
        if (options.sourceHeight) {
            sourceHeight = options.sourceHeight
            if (options.bottom !== undefined && options.top === undefined) {
                sourceY = height - sourceHeight - options.bottom
            }
        } else {
            sourceHeight = height - sourceY - (options.bottom || 0)
        }
        destWidth = sourceWidth
        destHeight = sourceHeight
    }
    maxWidth = options.maxWidth
    maxHeight = options.maxHeight
    minWidth = options.minWidth
    minHeight = options.minHeight
    if (useCanvas && maxWidth && maxHeight && options.crop) {
        destWidth = maxWidth
        destHeight = maxHeight
        tmp = sourceWidth / sourceHeight - maxWidth / maxHeight
        if (tmp < 0) {
            sourceHeight = maxHeight * sourceWidth / maxWidth
            if (options.top === undefined && options.bottom === undefined) {
                sourceY = (height - sourceHeight) / 2
            }
        } else if (tmp > 0) {
            sourceWidth = maxWidth * sourceHeight / maxHeight
            if (options.left === undefined && options.right === undefined) {
                sourceX = (width - sourceWidth) / 2
            }
        }
    } else {
        if (options.contain || options.cover) {
            minWidth = maxWidth = maxWidth || minWidth
            minHeight = maxHeight = maxHeight || minHeight
        }
        if (options.cover) {
            scaleDown()
            scaleUp()
        } else {
            scaleUp()
            scaleDown()
        }
    }
    if (useCanvas) {
        pixelRatio = options.pixelRatio
        if (pixelRatio > 1) {
            canvas.style.width = destWidth + 'px'
            canvas.style.height = destHeight + 'px'
            destWidth *= pixelRatio
            destHeight *= pixelRatio
            canvas.getContext('2d').scale(pixelRatio, pixelRatio)
        }
        downsamplingRatio = options.downsamplingRatio
        if (downsamplingRatio > 0 && downsamplingRatio < 1 &&
            destWidth < sourceWidth && destHeight < sourceHeight) {
            while (sourceWidth * downsamplingRatio > destWidth) {
                canvas.width = sourceWidth * downsamplingRatio
                canvas.height = sourceHeight * downsamplingRatio
                loadImage.renderImageToCanvas(
                    canvas,
                    img,
                    sourceX,
                    sourceY,
                    sourceWidth,
                    sourceHeight,
                    0,
                    0,
                    canvas.width,
                    canvas.height
                )
                sourceWidth = canvas.width
                sourceHeight = canvas.height
                img = document.createElement('canvas')
                img.width = sourceWidth
                img.height = sourceHeight
                loadImage.renderImageToCanvas(
                    img,
                    canvas,
                    0,
                    0,
                    sourceWidth,
                    sourceHeight,
                    0,
                    0,
                    sourceWidth,
                    sourceHeight
                )
            }
        }
        canvas.width = destWidth
        canvas.height = destHeight
        loadImage.transformCoordinates(
            canvas,
            options
        )
        return loadImage.renderImageToCanvas(
            canvas,
            img,
            sourceX,
            sourceY,
            sourceWidth,
            sourceHeight,
            0,
            0,
            destWidth,
            destHeight
        )
    }
    img.width = destWidth
    img.height = destHeight
    return img
}

loadImage.createObjectURL = function (file) {
    return urlAPI ? urlAPI.createObjectURL(file) : false
}

loadImage.revokeObjectURL = function (url) {
    return urlAPI ? urlAPI.revokeObjectURL(url) : false
}

// Loads a given File object via FileReader interface,
// invokes the callback with the event object (load or error).
// The result can be read via event.target.result:
loadImage.readFile = function (file, callback, method) {
    if (window.FileReader) {
        var fileReader = new FileReader()
        fileReader.onload = fileReader.onerror = callback
        method = method || 'readAsDataURL'
        if (fileReader[method]) {
            fileReader[method](file)
            return fileReader
        }
    }
    return false
}

var originalHasCanvasOption = loadImage.hasCanvasOption
var originalTransformCoordinates = loadImage.transformCoordinates
var originalGetTransformedOptions = loadImage.getTransformedOptions

// This method is used to determine if the target image
// should be a canvas element:
loadImage.hasCanvasOption = function (options) {
    return !!options.orientation ||
        originalHasCanvasOption.call(loadImage, options)
}

// Transform image orientation based on
// the given EXIF orientation option:
loadImage.transformCoordinates = function (canvas, options) {
    originalTransformCoordinates.call(loadImage, canvas, options)
    var ctx = canvas.getContext('2d')
    var width = canvas.width
    var height = canvas.height
    var styleWidth = canvas.style.width
    var styleHeight = canvas.style.height
    var orientation = options.orientation
    if (!orientation || orientation > 8) {
        return
    }
    if (orientation > 4) {
        canvas.width = height
        canvas.height = width
        canvas.style.width = styleHeight
        canvas.style.height = styleWidth
    }
    switch (orientation) {
        case 2:
            // horizontal flip
            ctx.translate(width, 0)
            ctx.scale(-1, 1)
            break
        case 3:
            // 180° rotate left
            ctx.translate(width, height)
            ctx.rotate(Math.PI)
            break
        case 4:
            // vertical flip
            ctx.translate(0, height)
            ctx.scale(1, -1)
            break
        case 5:
            // vertical flip + 90 rotate right
            ctx.rotate(0.5 * Math.PI)
            ctx.scale(1, -1)
            break
        case 6:
            // 90° rotate right
            ctx.rotate(0.5 * Math.PI)
            ctx.translate(0, -height)
            break
        case 7:
            // horizontal flip + 90 rotate right
            ctx.rotate(0.5 * Math.PI)
            ctx.translate(width, -height)
            ctx.scale(-1, 1)
            break
        case 8:
            // 90° rotate left
            ctx.rotate(-0.5 * Math.PI)
            ctx.translate(-width, 0)
            break
    }
}

// Transforms coordinate and dimension options
// based on the given orientation option:
loadImage.getTransformedOptions = function (img, opts) {
    var options = originalGetTransformedOptions.call(loadImage, img, opts)
    var orientation = options.orientation
    var newOptions
    var i
    if (!orientation || orientation > 8 || orientation === 1) {
        return options
    }
    newOptions = {}
    for (i in options) {
        if (options.hasOwnProperty(i)) {
            newOptions[i] = options[i]
        }
    }
    switch (options.orientation) {
        case 2:
            // horizontal flip
            newOptions.left = options.right
            newOptions.right = options.left
            break
        case 3:
            // 180° rotate left
            newOptions.left = options.right
            newOptions.top = options.bottom
            newOptions.right = options.left
            newOptions.bottom = options.top
            break
        case 4:
            // vertical flip
            newOptions.top = options.bottom
            newOptions.bottom = options.top
            break
        case 5:
            // vertical flip + 90 rotate right
            newOptions.left = options.top
            newOptions.top = options.left
            newOptions.right = options.bottom
            newOptions.bottom = options.right
            break
        case 6:
            // 90° rotate right
            newOptions.left = options.top
            newOptions.top = options.right
            newOptions.right = options.bottom
            newOptions.bottom = options.left
            break
        case 7:
            // horizontal flip + 90 rotate right
            newOptions.left = options.bottom
            newOptions.top = options.right
            newOptions.right = options.top
            newOptions.bottom = options.left
            break
        case 8:
            // 90° rotate left
            newOptions.left = options.bottom
            newOptions.top = options.left
            newOptions.right = options.top
            newOptions.bottom = options.right
            break
    }
    if (options.orientation > 4) {
        newOptions.maxWidth = options.maxHeight
        newOptions.maxHeight = options.maxWidth
        newOptions.minWidth = options.minHeight
        newOptions.minHeight = options.minWidth
        newOptions.sourceWidth = options.sourceHeight
        newOptions.sourceHeight = options.sourceWidth
    }
    return newOptions
}

var hasblobSlice = window.Blob && (Blob.prototype.slice ||
    Blob.prototype.webkitSlice || Blob.prototype.mozSlice)

loadImage.blobSlice = hasblobSlice && function () {
        var slice = this.slice || this.webkitSlice || this.mozSlice
        return slice.apply(this, arguments)
    }

loadImage.metaDataParsers = {
    jpeg: {
        0xffe1: [] // APP1 marker
    }
}

// Parses image meta data and calls the callback with an object argument
// with the following properties:
// * imageHead: The complete image head as ArrayBuffer (Uint8Array for IE10)
// The options arguments accepts an object and supports the following properties:
// * maxMetaDataSize: Defines the maximum number of bytes to parse.
// * disableImageHead: Disables creating the imageHead property.
loadImage.parseMetaData = function (file, callback, options) {
    options = options || {}
    var that = this
    // 256 KiB should contain all EXIF/ICC/IPTC segments:
    var maxMetaDataSize = options.maxMetaDataSize || 262144
    var data = {}
    var noMetaData = !(window.DataView && file && file.size >= 12 &&
    file.type === 'image/jpeg' && loadImage.blobSlice)
    if (noMetaData || !loadImage.readFile(
            loadImage.blobSlice.call(file, 0, maxMetaDataSize),
            function (e) {
                if (e.target.error) {
                    // FileReader error
                    console.log(e.target.error)
                    callback(data)
                    return
                }
                // Note on endianness:
                // Since the marker and length bytes in JPEG files are always
                // stored in big endian order, we can leave the endian parameter
                // of the DataView methods undefined, defaulting to big endian.
                var buffer = e.target.result
                var dataView = new DataView(buffer)
                var offset = 2
                var maxOffset = dataView.byteLength - 4
                var headLength = offset
                var markerBytes
                var markerLength
                var parsers
                var i
                // Check for the JPEG marker (0xffd8):
                if (dataView.getUint16(0) === 0xffd8) {
                    while (offset < maxOffset) {
                        markerBytes = dataView.getUint16(offset)
                        // Search for APPn (0xffeN) and COM (0xfffe) markers,
                        // which contain application-specific meta-data like
                        // Exif, ICC and IPTC data and text comments:
                        if ((markerBytes >= 0xffe0 && markerBytes <= 0xffef) ||
                            markerBytes === 0xfffe) {
                            // The marker bytes (2) are always followed by
                            // the length bytes (2), indicating the length of the
                            // marker segment, which includes the length bytes,
                            // but not the marker bytes, so we add 2:
                            markerLength = dataView.getUint16(offset + 2) + 2
                            if (offset + markerLength > dataView.byteLength) {
                                console.log('Invalid meta data: Invalid segment size.')
                                break
                            }
                            parsers = loadImage.metaDataParsers.jpeg[markerBytes]
                            if (parsers) {
                                for (i = 0; i < parsers.length; i += 1) {
                                    parsers[i].call(
                                        that,
                                        dataView,
                                        offset,
                                        markerLength,
                                        data,
                                        options
                                    )
                                }
                            }
                            offset += markerLength
                            headLength = offset
                        } else {
                            // Not an APPn or COM marker, probably safe to
                            // assume that this is the end of the meta data
                            break
                        }
                    }
                    // Meta length must be longer than JPEG marker (2)
                    // plus APPn marker (2), followed by length bytes (2):
                    if (!options.disableImageHead && headLength > 6) {
                        if (buffer.slice) {
                            data.imageHead = buffer.slice(0, headLength)
                        } else {
                            // Workaround for IE10, which does not yet
                            // support ArrayBuffer.slice:
                            data.imageHead = new Uint8Array(buffer)
                                .subarray(0, headLength)
                        }
                    }
                } else {
                    console.log('Invalid JPEG file: Missing JPEG marker.')
                }
                callback(data)
            },
            'readAsArrayBuffer'
        )) {
        callback(data)
    }
}

loadImage.ExifMap = function () {
    return this
}

loadImage.ExifMap.prototype.map = {
    'Orientation': 0x0112
}

loadImage.ExifMap.prototype.get = function (id) {
    return this[id] || this[this.map[id]]
}

loadImage.getExifThumbnail = function (dataView, offset, length) {
    var hexData,
        i,
        b
    if (!length || offset + length > dataView.byteLength) {
        console.log('Invalid Exif data: Invalid thumbnail data.')
        return
    }
    hexData = []
    for (i = 0; i < length; i += 1) {
        b = dataView.getUint8(offset + i)
        hexData.push((b < 16 ? '0' : '') + b.toString(16))
    }
    return 'data:image/jpeg,%' + hexData.join('%')
}

loadImage.exifTagTypes = {
    // byte, 8-bit unsigned int:
    1: {
        getValue: function (dataView, dataOffset) {
            return dataView.getUint8(dataOffset)
        },
        size: 1
    },
    // ascii, 8-bit byte:
    2: {
        getValue: function (dataView, dataOffset) {
            return String.fromCharCode(dataView.getUint8(dataOffset))
        },
        size: 1,
        ascii: true
    },
    // short, 16 bit int:
    3: {
        getValue: function (dataView, dataOffset, littleEndian) {
            return dataView.getUint16(dataOffset, littleEndian)
        },
        size: 2
    },
    // long, 32 bit int:
    4: {
        getValue: function (dataView, dataOffset, littleEndian) {
            return dataView.getUint32(dataOffset, littleEndian)
        },
        size: 4
    },
    // rational = two long values, first is numerator, second is denominator:
    5: {
        getValue: function (dataView, dataOffset, littleEndian) {
            return dataView.getUint32(dataOffset, littleEndian) /
                dataView.getUint32(dataOffset + 4, littleEndian)
        },
        size: 8
    },
    // slong, 32 bit signed int:
    9: {
        getValue: function (dataView, dataOffset, littleEndian) {
            return dataView.getInt32(dataOffset, littleEndian)
        },
        size: 4
    },
    // srational, two slongs, first is numerator, second is denominator:
    10: {
        getValue: function (dataView, dataOffset, littleEndian) {
            return dataView.getInt32(dataOffset, littleEndian) /
                dataView.getInt32(dataOffset + 4, littleEndian)
        },
        size: 8
    }
}
// undefined, 8-bit byte, value depending on field:
loadImage.exifTagTypes[7] = loadImage.exifTagTypes[1]

loadImage.getExifValue = function (dataView, tiffOffset, offset, type, length, littleEndian) {
    var tagType = loadImage.exifTagTypes[type]
    var tagSize
    var dataOffset
    var values
    var i
    var str
    var c
    if (!tagType) {
        console.log('Invalid Exif data: Invalid tag type.')
        return
    }
    tagSize = tagType.size * length
    // Determine if the value is contained in the dataOffset bytes,
    // or if the value at the dataOffset is a pointer to the actual data:
    dataOffset = tagSize > 4
        ? tiffOffset + dataView.getUint32(offset + 8, littleEndian)
        : (offset + 8)
    if (dataOffset + tagSize > dataView.byteLength) {
        console.log('Invalid Exif data: Invalid data offset.')
        return
    }
    if (length === 1) {
        return tagType.getValue(dataView, dataOffset, littleEndian)
    }
    values = []
    for (i = 0; i < length; i += 1) {
        values[i] = tagType.getValue(dataView, dataOffset + i * tagType.size, littleEndian)
    }
    if (tagType.ascii) {
        str = ''
        // Concatenate the chars:
        for (i = 0; i < values.length; i += 1) {
            c = values[i]
            // Ignore the terminating NULL byte(s):
            if (c === '\u0000') {
                break
            }
            str += c
        }
        return str
    }
    return values
}

loadImage.parseExifTag = function (dataView, tiffOffset, offset, littleEndian, data) {
    var tag = dataView.getUint16(offset, littleEndian)
    data.exif[tag] = loadImage.getExifValue(
        dataView,
        tiffOffset,
        offset,
        dataView.getUint16(offset + 2, littleEndian), // tag type
        dataView.getUint32(offset + 4, littleEndian), // tag length
        littleEndian
    )
}

loadImage.parseExifTags = function (dataView, tiffOffset, dirOffset, littleEndian, data) {
    var tagsNumber,
        dirEndOffset,
        i
    if (dirOffset + 6 > dataView.byteLength) {
        console.log('Invalid Exif data: Invalid directory offset.')
        return
    }
    tagsNumber = dataView.getUint16(dirOffset, littleEndian)
    dirEndOffset = dirOffset + 2 + 12 * tagsNumber
    if (dirEndOffset + 4 > dataView.byteLength) {
        console.log('Invalid Exif data: Invalid directory size.')
        return
    }
    for (i = 0; i < tagsNumber; i += 1) {
        this.parseExifTag(
            dataView,
            tiffOffset,
            dirOffset + 2 + 12 * i, // tag offset
            littleEndian,
            data
        )
    }
    // Return the offset to the next directory:
    return dataView.getUint32(dirEndOffset, littleEndian)
}

loadImage.parseExifData = function (dataView, offset, length, data, options) {
    if (options.disableExif) {
        return
    }
    var tiffOffset = offset + 10
    var littleEndian
    var dirOffset
    var thumbnailData
    // Check for the ASCII code for "Exif" (0x45786966):
    if (dataView.getUint32(offset + 4) !== 0x45786966) {
        // No Exif data, might be XMP data instead
        return
    }
    if (tiffOffset + 8 > dataView.byteLength) {
        console.log('Invalid Exif data: Invalid segment size.')
        return
    }
    // Check for the two null bytes:
    if (dataView.getUint16(offset + 8) !== 0x0000) {
        console.log('Invalid Exif data: Missing byte alignment offset.')
        return
    }
    // Check the byte alignment:
    switch (dataView.getUint16(tiffOffset)) {
        case 0x4949:
            littleEndian = true
            break
        case 0x4D4D:
            littleEndian = false
            break
        default:
            console.log('Invalid Exif data: Invalid byte alignment marker.')
            return
    }
    // Check for the TIFF tag marker (0x002A):
    if (dataView.getUint16(tiffOffset + 2, littleEndian) !== 0x002A) {
        console.log('Invalid Exif data: Missing TIFF marker.')
        return
    }
    // Retrieve the directory offset bytes, usually 0x00000008 or 8 decimal:
    dirOffset = dataView.getUint32(tiffOffset + 4, littleEndian)
    // Create the exif object to store the tags:
    data.exif = new loadImage.ExifMap()
    // Parse the tags of the main image directory and retrieve the
    // offset to the next directory, usually the thumbnail directory:
    dirOffset = loadImage.parseExifTags(
        dataView,
        tiffOffset,
        tiffOffset + dirOffset,
        littleEndian,
        data
    )
    if (dirOffset && !options.disableExifThumbnail) {
        thumbnailData = {exif: {}}
        dirOffset = loadImage.parseExifTags(
            dataView,
            tiffOffset,
            tiffOffset + dirOffset,
            littleEndian,
            thumbnailData
        )
        // Check for JPEG Thumbnail offset:
        if (thumbnailData.exif[0x0201]) {
            data.exif.Thumbnail = loadImage.getExifThumbnail(
                dataView,
                tiffOffset + thumbnailData.exif[0x0201],
                thumbnailData.exif[0x0202] // Thumbnail data length
            )
        }
    }
    // Check for Exif Sub IFD Pointer:
    if (data.exif[0x8769] && !options.disableExifSub) {
        loadImage.parseExifTags(
            dataView,
            tiffOffset,
            tiffOffset + data.exif[0x8769], // directory offset
            littleEndian,
            data
        )
    }
    // Check for GPS Info IFD Pointer:
    if (data.exif[0x8825] && !options.disableExifGps) {
        loadImage.parseExifTags(
            dataView,
            tiffOffset,
            tiffOffset + data.exif[0x8825], // directory offset
            littleEndian,
            data
        )
    }
}

// Registers the Exif parser for the APP1 JPEG meta data segment:
loadImage.metaDataParsers.jpeg[0xffe1].push(loadImage.parseExifData)

var snabbt = (function() {

  var tickRequests = [];
  var runningAnimations = [];
  var completedAnimations = [];
  var transformProperty = 'transform';

  // Find which vendor prefix to use
  var styles = window.getComputedStyle(document.documentElement, '');
  var vendorPrefix = (Array.prototype.slice
      .call(styles)
      .join('') 
      .match(/-(moz|webkit|ms)-/) || (styles.OLink === '' && ['', 'o'])
    )[1];
  if(vendorPrefix === 'webkit')
    transformProperty = 'webkitTransform';

  /* Entry point, only function to be called by user */
  var snabbt = function(arg1, arg2, arg3) {

    var elements = arg1;

    // If argument is an Array or a NodeList or other list type that can be iterable.
    // Loop through and start one animation for each element.
    if(elements.length !== undefined) {
      var aggregateChainer = {
        chainers: [],
        then: function(opts) {
          return this.snabbt(opts);
        },
        snabbt: function(opts) {
          var len = this.chainers.length;
          this.chainers.forEach(function(chainer, index) {
            chainer.snabbt(preprocessOptions(opts, index, len));
          });
          return aggregateChainer;
        },
        setValue: function(value) {
          this.chainers.forEach(function(chainer) {
            chainer.setValue(value);
          });
          return aggregateChainer;
        },
        finish: function() {
          this.chainers.forEach(function(chainer) {
            chainer.finish();
          });
          return aggregateChainer;
        },
        rollback: function() {
          this.chainers.forEach(function(chainer) {
            chainer.rollback();
          });
          return aggregateChainer;
        }
      };

      for(var i=0, len=elements.length;i<len;++i) {
        if(typeof arg2 == 'string')
          aggregateChainer.chainers.push(snabbtSingleElement(elements[i], arg2, preprocessOptions(arg3, i, len)));
        else
          aggregateChainer.chainers.push(snabbtSingleElement(elements[i], preprocessOptions(arg2, i, len), arg3));
      }
      return aggregateChainer;
    } else {
      if(typeof arg2 == 'string')
        return snabbtSingleElement(elements, arg2, preprocessOptions(arg3, 0, 1));
      else
        return snabbtSingleElement(elements, preprocessOptions(arg2, 0, 1), arg3);
    }
  };

  var preprocessOptions = function(options, index, len) {
    if(!options)
      return options;
    var clone = cloneObject(options);

    if(isFunction(options.delay)) {
      clone.delay = options.delay(index, len);
    }

    if(isFunction(options.callback)) {
      clone.complete = function() {
        options.callback.call(this, index, len);
      };
    }

    var hasAllDoneCallback = isFunction(options.allDone);
    var hasCompleteCallback = isFunction(options.complete);

    if(hasCompleteCallback || hasAllDoneCallback) {
      clone.complete = function() {
        if(hasCompleteCallback) {
          options.complete.call(this, index, len);
        }
        if(hasAllDoneCallback && (index == len - 1)) {
          options.allDone();
        }
      };
    }

    if(isFunction(options.valueFeeder)) {
      clone.valueFeeder = function(i, matrix) {
        return options.valueFeeder(i, matrix, index, len);
      };
    }
    if(isFunction(options.easing)) {
      clone.easing = function(i) {
        return options.easing(i, index, len);
      };
    }

    var properties = [
      'position',
      'rotation',
      'skew',
      'rotationPost',
      'scale',
      'width',
      'height',
      'opacity',
      'fromPosition',
      'fromRotation',
      'fromSkew',
      'fromRotationPost',
      'fromScale',
      'fromWidth',
      'fromHeight',
      'fromOpacity',
      'transformOrigin',
      'duration',
      'delay'
    ];

    properties.forEach(function(property) {
      if(isFunction(options[property])) {
        clone[property] = options[property](index, len);
      }
    });

    return clone;
  };

  var snabbtSingleElement = function(element, arg2, arg3) {
    if(arg2 === 'attention')
      return setupAttentionAnimation(element, arg3);
    if(arg2 === 'stop')
      return stopAnimation(element);
    var options = arg2;

    // Remove orphaned end states
    clearOphanedEndStates();

    // If there is a running or past completed animation with element, use that end state as start state
    var currentState = currentAnimationState(element);
    var start = currentState;
    // from has precendance over current animation state
    start = stateFromOptions(options, start, true);
    var end = cloneObject(currentState);
    end = stateFromOptions(options, end);

    var animOptions = setupAnimationOptions(start, end, options);
    var animation = createAnimation(animOptions);

    runningAnimations.push([element, animation]);

    animation.updateElement(element, true);
    var queue = [];
    var chainer = {
      snabbt: function(opts) {
        queue.unshift(preprocessOptions(opts, 0, 1));
        return chainer;
      },
      then: function(opts) {
        return this.snabbt(opts);
      }
    };

    function tick(time) {
      animation.tick(time);
      animation.updateElement(element);
      if(animation.isStopped())
        return;

      if(!animation.completed())
        return queueTick(tick);

      if(options.loop > 1 && !animation.isStopped()) {
        // Loop current animation
        options.loop -= 1;
        animation.restart();
        queueTick(tick);
      } else {
        if(options.complete) {
          options.complete.call(element);
        }

        // Start next animation in queue
        if(queue.length) {
          options = queue.pop();

          start = stateFromOptions(options, end, true);
          end = stateFromOptions(options, cloneObject(end));
          options = setupAnimationOptions(start, end, options);

          animation = createAnimation(options);
          runningAnimations.push([element, animation]);

          animation.tick(time);
          queueTick(tick);
        }
      }
    }

    queueTick(tick);
    // Manual animations are not chainable, instead an animation controller object is returned
    // with setValue, finish and rollback methods
    if(options.manual)
      return animation;
    return chainer;
  };

  var setupAttentionAnimation = function(element,  options) {
    var movement = stateFromOptions(options, createState({}));
    options.movement = movement;
    var animation = createAttentionAnimation(options);

    runningAnimations.push([element, animation]);
    function tick(time) {
      animation.tick(time);
      animation.updateElement(element);
      if(!animation.completed()) {
        queueTick(tick);
      } else {
        if(options.callback) {
          options.callback(element);
        }
        if(options.loop && options.loop > 1) {
          options.loop--;
          animation.restart();
          queueTick(tick);
        }
      }
    }
    queueTick(tick);
  };

  var stopAnimation = function(element) {
    for(var i= 0,len=runningAnimations.length;i<len;++i) {
      var currentAnimation = runningAnimations[i];
      var animatedElement = currentAnimation[0];
      var animation = currentAnimation[1];

      if(animatedElement === element) {
        animation.stop();
      }
    }
  };

  var findAnimationState = function(animationList, element) {
    for(var i=0,len=animationList.length;i<len;++i) {
      var currentAnimation = animationList[i];
      var animatedElement = currentAnimation[0];
      var animation = currentAnimation[1];

      if(animatedElement === element) {
        var state = animation.getCurrentState();
        animation.stop();
        return state;
      }
    }
  };

  var clearOphanedEndStates = function() {
    completedAnimations = completedAnimations.filter(function(animation) {
      return (findUltimateAncestor(animation[0]).body);
    });
  };

  var findUltimateAncestor = function(node) {
    var ancestor = node;
    while(ancestor.parentNode) {
      ancestor = ancestor.parentNode;
    }
    return ancestor;
  };

  /**
   * Returns the current state of element if there is an ongoing or previously finished
   * animation releated to it. Will also call stop on the animation.
   * TODO: The stopping of the animation is better put somewhere else
   */
  var currentAnimationState = function(element) {
    // Check if a completed animation is stored for this element
    var state = findAnimationState(runningAnimations, element);
    if(state)
      return state;
   
    return findAnimationState(completedAnimations, element);
  };

  /**
   * Parses an animation configuration object and returns a State instance
   */
  var stateFromOptions = function(options, state, useFromPrefix) {
    if (!state) {
      state = createState({
        position: [0, 0, 0],
        rotation: [0, 0, 0],
        rotationPost: [0, 0, 0],
        scale: [1, 1],
        skew: [0, 0]
      });
    }
    var position = 'position';
    var rotation = 'rotation';
    var skew = 'skew';
    var rotationPost = 'rotationPost';
    var scale = 'scale';
    var scalePost = 'scalePost';
    var width = 'width';
    var height = 'height';
    var opacity = 'opacity';

    if(useFromPrefix) {
      position = 'fromPosition';
      rotation = 'fromRotation';
      skew = 'fromSkew';
      rotationPost = 'fromRotationPost';
      scale = 'fromScale';
      scalePost = 'fromScalePost';
      width = 'fromWidth';
      height = 'fromHeight';
      opacity = 'fromOpacity';
    }

    state.position = optionOrDefault(options[position], state.position);
    state.rotation = optionOrDefault(options[rotation], state.rotation);
    state.rotationPost = optionOrDefault(options[rotationPost], state.rotationPost);
    state.skew = optionOrDefault(options[skew], state.skew);
    state.scale = optionOrDefault(options[scale], state.scale);
    state.scalePost = optionOrDefault(options[scalePost], state.scalePost);
    state.opacity = options[opacity];
    state.width = options[width];
    state.height = options[height];

    return state;
  };

  var setupAnimationOptions = function(start, end, options) {
    options.startState = start;
    options.endState = end;
    return options;
  };

  var polyFillrAF = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.msRequestAnimationFrame || function(callback) { return setTimeout(callback, 1000 / 60); }; 

  var queueTick = function(func) {
    if(tickRequests.length === 0)
      polyFillrAF(tickAnimations);
    tickRequests.push(func);
  };

  var tickAnimations = function(time) {
    var len = tickRequests.length;
    for(var i=0;i<len;++i) {
      tickRequests[i](time);
    }
    tickRequests.splice(0, len);

    var finishedAnimations = runningAnimations.filter(function(animation) {
      return animation[1].completed();
    });

    // See if there are any previously completed animations on the same element, if so, remove it before merging
    completedAnimations = completedAnimations.filter(function(animation) {
      for(var i=0,len=finishedAnimations.length;i<len;++i) {
        if(animation[0] === finishedAnimations[i][0]) {
          return false;
        }
      }
      return true;
    });

    completedAnimations = completedAnimations.concat(finishedAnimations);

    runningAnimations = runningAnimations.filter(function(animation) {
      return !animation[1].completed();
    });

    if(tickRequests.length !== 0)
      polyFillrAF(tickAnimations);
  };


  // Class for handling animation between two states
  var createAnimation = function(options) {
    var startState = options.startState;
    var endState = options.endState;
    var duration = optionOrDefault(options.duration, 500);
    var delay = optionOrDefault(options.delay, 0);
    var perspective = options.perspective;
    var easing = createEaser(optionOrDefault(options.easing, 'linear'), options);
    var currentState = duration === 0 ? endState.clone() : startState.clone();
    var transformOrigin = options.transformOrigin;
    currentState.transformOrigin = options.transformOrigin;

    var startTime = 0;
    var currentTime = 0;
    var stopped = false;
    var started = false;

    // Manual related
    var manual = options.manual;
    var manualValue = 0;
    var manualDelayFactor = delay / duration;
    var manualCallback;

    var tweener;
    // Setup tweener
    if(options.valueFeeder) {
      tweener = createValueFeederTweener(options.valueFeeder,
                                         startState,
                                         endState,
                                         currentState);
    } else {
      tweener = createStateTweener(startState, endState, currentState);
    }

    // Public api
    return {
      stop: function() {
        stopped = true;
      },
      isStopped: function() {
        return stopped;
      },

      finish: function(callback) {
        manual = false;
        var manualDuration = duration * manualValue;
        startTime = currentTime - manualDuration;
        manualCallback = callback;
        easing.resetFrom = manualValue;
      },

      rollback: function(callback) {
        manual = false;
        tweener.setReverse();
        var manualDuration = duration * (1 - manualValue);
        startTime = currentTime - manualDuration;
        manualCallback = callback;
        easing.resetFrom = manualValue;
      },

      restart: function() {
        // Restart timer
        startTime = undefined;
        easing.resetFrom(0);
      },

      tick: function(time) {
        if(stopped)
          return;

        if(manual) {
          currentTime = time;
          this.updateCurrentTransform();
          return;
        }

        // If first tick, set startTime
        if(!startTime) {
          startTime = time;
        }
        if(time - startTime > delay) {
          started = true;
          currentTime = time - delay;

          var curr = Math.min(Math.max(0.0, currentTime - startTime), duration);
          easing.tick(curr / duration);
          this.updateCurrentTransform();
          if(this.completed() && manualCallback) {
            manualCallback();
          }
        }
      },

      getCurrentState: function() {
        return currentState;
      },

      setValue: function(_manualValue) {
        started = true;
        manualValue = Math.min(Math.max(_manualValue, 0.0001), 1 + manualDelayFactor);
      },

      updateCurrentTransform: function() {
        var tweenValue = easing.getValue();
        if(manual) {
          var val = Math.max(0.00001, manualValue - manualDelayFactor);
          easing.tick(val);
          tweenValue = easing.getValue();
        }
        tweener.tween(tweenValue);
      },

      completed: function() {
        if(stopped)
          return true;
        if(startTime === 0) {
          return false;
        }
        return easing.completed();
      },

      updateElement: function(element, forceUpdate) {
        if(!started && !forceUpdate)
          return;
        var matrix = tweener.asMatrix();
        var properties = tweener.getProperties();
        updateElementTransform(element, matrix, perspective);
        updateElementProperties(element, properties);
      }
    };
  };

  // ------------------------------
  // End Time animation
  // ------------------------------

  // ------------------------
  // -- AttentionAnimation --
  // ------------------------

  var createAttentionAnimation = function(options) {
    var movement = options.movement;
    options.initialVelocity = 0.1;
    options.equilibriumPosition = 0;
    var spring = createSpringEasing(options);
    var stopped = false;
    var tweenPosition = movement.position;
    var tweenRotation = movement.rotation;
    var tweenRotationPost = movement.rotationPost;
    var tweenScale = movement.scale;
    var tweenSkew = movement.skew;

    var currentMovement = createState({
      position: tweenPosition ? [0, 0, 0] : undefined,
      rotation: tweenRotation ? [0, 0, 0] : undefined,
      rotationPost: tweenRotationPost ? [0, 0, 0] : undefined,
      scale: tweenScale ? [0, 0] : undefined,
      skew: tweenSkew ? [0, 0] : undefined,
    });

    // Public API
    return {
      stop: function() {
        stopped = true;
      },

      isStopped: function(time) {
        return stopped;
      },

      tick: function(time) {
        if(stopped)
          return;
        if(spring.equilibrium)
          return;
        spring.tick();

        this.updateMovement();
      },

      updateMovement:function() {
        var value = spring.getValue();
        if(tweenPosition) {
          currentMovement.position[0] = movement.position[0] * value;
          currentMovement.position[1] = movement.position[1] * value;
          currentMovement.position[2] = movement.position[2] * value;
        }
        if(tweenRotation) {
          currentMovement.rotation[0] = movement.rotation[0] * value;
          currentMovement.rotation[1] = movement.rotation[1] * value;
          currentMovement.rotation[2] = movement.rotation[2] * value;
        }
        if(tweenRotationPost) {
          currentMovement.rotationPost[0] = movement.rotationPost[0] * value;
          currentMovement.rotationPost[1] = movement.rotationPost[1] * value;
          currentMovement.rotationPost[2] = movement.rotationPost[2] * value;
        }
        if(tweenScale) {
          currentMovement.scale[0] = 1 + movement.scale[0] * value;
          currentMovement.scale[1] = 1 + movement.scale[1] * value;
        }

        if(tweenSkew) {
          currentMovement.skew[0] = movement.skew[0] * value;
          currentMovement.skew[1] = movement.skew[1] * value;
        }
      },

      updateElement: function(element) {
        updateElementTransform(element, currentMovement.asMatrix());
        updateElementProperties(element, currentMovement.getProperties());
      },

      getCurrentState: function() {
        return currentMovement;
      },

      completed: function() {
        return spring.equilibrium || stopped;
      },

      restart: function() {
        // Restart spring
        spring = createSpringEasing(options);
      }
    };
  };


  /**********
  * Easings *
  ***********/

  var linearEasing = function(value) {
    return value;
  };

  var ease = function(value) {
    return (Math.cos(value*Math.PI + Math.PI) + 1)/2;
  };

  var easeIn = function(value) {
    return value*value;
  };

  var easeOut = function(value) {
    return -Math.pow(value - 1, 2) + 1;
  };

  var createSpringEasing = function(options) {
    var position = optionOrDefault(options.startPosition, 0);
    var equilibriumPosition = optionOrDefault(options.equilibriumPosition, 1);
    var velocity = optionOrDefault(options.initialVelocity, 0);
    var springConstant = optionOrDefault(options.springConstant, 0.8);
    var deceleration = optionOrDefault(options.springDeceleration, 0.9);
    var mass = optionOrDefault(options.springMass, 10);

    var equilibrium = false;

    // Public API
    return {

      tick: function(value) {
        if(value === 0.0)
          return;
        if(equilibrium)
          return;
        var springForce = -(position - equilibriumPosition) * springConstant;
        // f = m * a
        // a = f / m
        var a = springForce / mass;
        // s = v * t
        // t = 1 ( for now )
        velocity += a;
        position += velocity;

        // Deceleration
        velocity *= deceleration;

        if(Math.abs(position - equilibriumPosition) < 0.001 && Math.abs(velocity) < 0.001) {
          equilibrium = true;
        }
      },

      resetFrom: function(value) {
        position = value;
        velocity = 0;
      },


      getValue: function() {
        if(equilibrium)
          return equilibriumPosition;
        return position;
      },

      completed: function() {
        return equilibrium;
      }
    };
  };

  var EASING_FUNCS = {
    'linear': linearEasing,
    'ease': ease,
    'easeIn': easeIn,
    'easeOut': easeOut,
  };


  var createEaser = function(easerName, options) {
    if(easerName == 'spring') {
      return createSpringEasing(options);
    }
    var easeFunction = easerName;
    if(!isFunction(easerName)) {
      easeFunction = EASING_FUNCS[easerName];
    }

    var easer = easeFunction;
    var value = 0;
    var lastValue;

    // Public API
    return {
      tick: function(v) {
        value = easer(v);
        lastValue = v;
      },

      resetFrom: function(value) {
        lastValue = 0;
      },

      getValue: function() {
        return value;
      },

      completed: function() {
        if(lastValue >= 1) {
          return lastValue;
        }
        return false;
      }
    };
  };

  /***
   * Matrix related
   */

  var assignTranslate = function(matrix, x, y, z) {
    matrix[0] = 1;
    matrix[1] = 0;
    matrix[2] = 0;
    matrix[3] = 0;
    matrix[4] = 0;
    matrix[5] = 1;
    matrix[6] = 0;
    matrix[7] = 0;
    matrix[8] = 0;
    matrix[9] = 0;
    matrix[10] = 1;
    matrix[11] = 0;
    matrix[12] = x;
    matrix[13] = y;
    matrix[14] = z;
    matrix[15] = 1;
  };

  var assignRotateX = function(matrix, rad) {
    matrix[0] = 1;
    matrix[1] = 0;
    matrix[2] = 0;
    matrix[3] = 0;
    matrix[4] = 0;
    matrix[5] = Math.cos(rad);
    matrix[6] = -Math.sin(rad);
    matrix[7] = 0;
    matrix[8] = 0;
    matrix[9] = Math.sin(rad);
    matrix[10] = Math.cos(rad);
    matrix[11] = 0;
    matrix[12] = 0;
    matrix[13] = 0;
    matrix[14] = 0;
    matrix[15] = 1;
  };


  var assignRotateY = function(matrix, rad) {
    matrix[0] = Math.cos(rad);
    matrix[1] = 0;
    matrix[2] = Math.sin(rad);
    matrix[3] = 0;
    matrix[4] = 0;
    matrix[5] = 1;
    matrix[6] = 0;
    matrix[7] = 0;
    matrix[8] = -Math.sin(rad);
    matrix[9] = 0;
    matrix[10] = Math.cos(rad);
    matrix[11] = 0;
    matrix[12] = 0;
    matrix[13] = 0;
    matrix[14] = 0;
    matrix[15] = 1;
  };

  var assignRotateZ = function(matrix, rad) {
    matrix[0] = Math.cos(rad);
    matrix[1] = -Math.sin(rad);
    matrix[2] = 0;
    matrix[3] = 0;
    matrix[4] = Math.sin(rad);
    matrix[5] = Math.cos(rad);
    matrix[6] = 0;
    matrix[7] = 0;
    matrix[8] = 0;
    matrix[9] = 0;
    matrix[10] = 1;
    matrix[11] = 0;
    matrix[12] = 0;
    matrix[13] = 0;
    matrix[14] = 0;
    matrix[15] = 1;
  };

  var assignSkew = function(matrix, ax, ay) {
    matrix[0] = 1;
    matrix[1] = Math.tan(ax);
    matrix[2] = 0;
    matrix[3] = 0;
    matrix[4] = Math.tan(ay);
    matrix[5] = 1;
    matrix[6] = 0;
    matrix[7] = 0;
    matrix[8] = 0;
    matrix[9] = 0;
    matrix[10] = 1;
    matrix[11] = 0;
    matrix[12] = 0;
    matrix[13] = 0;
    matrix[14] = 0;
    matrix[15] = 1;
  };


  var assignScale = function(matrix, x, y) {
    matrix[0] = x;
    matrix[1] = 0;
    matrix[2] = 0;
    matrix[3] = 0;
    matrix[4] = 0;
    matrix[5] = y;
    matrix[6] = 0;
    matrix[7] = 0;
    matrix[8] = 0;
    matrix[9] = 0;
    matrix[10] = 1;
    matrix[11] = 0;
    matrix[12] = 0;
    matrix[13] = 0;
    matrix[14] = 0;
    matrix[15] = 1;
  };

  var assignIdentity = function(matrix) {
    matrix[0] = 1;
    matrix[1] = 0;
    matrix[2] = 0;
    matrix[3] = 0;
    matrix[4] = 0;
    matrix[5] = 1;
    matrix[6] = 0;
    matrix[7] = 0;
    matrix[8] = 0;
    matrix[9] = 0;
    matrix[10] = 1;
    matrix[11] = 0;
    matrix[12] = 0;
    matrix[13] = 0;
    matrix[14] = 0;
    matrix[15] = 1;
  };

  var copyArray = function(a, b) {
    b[0] = a[0];
    b[1] = a[1];
    b[2] = a[2];
    b[3] = a[3];
    b[4] = a[4];
    b[5] = a[5];
    b[6] = a[6];
    b[7] = a[7];
    b[8] = a[8];
    b[9] = a[9];
    b[10] = a[10];
    b[11] = a[11];
    b[12] = a[12];
    b[13] = a[13];
    b[14] = a[14];
    b[15] = a[15];
  };

  var createMatrix = function() {
    var data = new Float32Array(16);
    var a = new Float32Array(16);
    var b = new Float32Array(16);
    assignIdentity(data);

    return {
      data: data,

      asCSS: function() {
        var css = 'matrix3d(';
        for(var i=0;i<15;++i) {
          if(Math.abs(data[i]) < 0.0001)
            css += '0,';
          else
            css += data[i].toFixed(10) + ',';
        }
        if(Math.abs(data[15]) < 0.0001)
          css += '0)';
        else
          css += data[15].toFixed(10) + ')';
        return css;
      },

      clear: function() {
        assignIdentity(data);
      },

      translate: function(x, y, z) {
        copyArray(data, a);
        assignTranslate(b, x, y, z);
        assignedMatrixMultiplication(a, b, data);
        return this;
      },

      rotateX: function(radians) {
        copyArray(data, a);
        assignRotateX(b, radians);
        assignedMatrixMultiplication(a, b, data);
        return this;
      },

      rotateY: function(radians) {
        copyArray(data, a);
        assignRotateY(b, radians);
        assignedMatrixMultiplication(a, b, data);
        return this;
      },

      rotateZ: function(radians) {
        copyArray(data, a);
        assignRotateZ(b, radians);
        assignedMatrixMultiplication(a, b, data);
        return this;
      },

      scale: function(x, y) {
        copyArray(data, a);
        assignScale(b, x, y);
        assignedMatrixMultiplication(a, b, data);
        return this;
      },

      skew: function(ax, ay) {
        copyArray(data, a);
        assignSkew(b, ax, ay);
        assignedMatrixMultiplication(a, b, data);
        return this;
      }
    };
  };

  var assignedMatrixMultiplication = function(a, b, res) {
    // Unrolled loop
    res[0] = a[0] * b[0] + a[1] * b[4] + a[2] * b[8] + a[3] * b[12];
    res[1] = a[0] * b[1] + a[1] * b[5] + a[2] * b[9] + a[3] * b[13];
    res[2] = a[0] * b[2] + a[1] * b[6] + a[2] * b[10] + a[3] * b[14];
    res[3] = a[0] * b[3] + a[1] * b[7] + a[2] * b[11] + a[3] * b[15];

    res[4] = a[4] * b[0] + a[5] * b[4] + a[6] * b[8] + a[7] * b[12];
    res[5] = a[4] * b[1] + a[5] * b[5] + a[6] * b[9] + a[7] * b[13];
    res[6] = a[4] * b[2] + a[5] * b[6] + a[6] * b[10] + a[7] * b[14];
    res[7] = a[4] * b[3] + a[5] * b[7] + a[6] * b[11] + a[7] * b[15];

    res[8] = a[8] * b[0] + a[9] * b[4] + a[10] * b[8] + a[11] * b[12];
    res[9] = a[8] * b[1] + a[9] * b[5] + a[10] * b[9] + a[11] * b[13];
    res[10] = a[8] * b[2] + a[9] * b[6] + a[10] * b[10] + a[11] * b[14];
    res[11] = a[8] * b[3] + a[9] * b[7] + a[10] * b[11] + a[11] * b[15];

    res[12] = a[12] * b[0] + a[13] * b[4] + a[14] * b[8] + a[15] * b[12];
    res[13] = a[12] * b[1] + a[13] * b[5] + a[14] * b[9] + a[15] * b[13];
    res[14] = a[12] * b[2] + a[13] * b[6] + a[14] * b[10] + a[15] * b[14];
    res[15] = a[12] * b[3] + a[13] * b[7] + a[14] * b[11] + a[15] * b[15];

    return res;
  };

  var createState = function(config) {
    // Caching of matrix and properties so we don't have to create new ones everytime they are needed
    var matrix = createMatrix();
    var properties = {
      opacity: undefined,
      width: undefined,
      height: undefined
    };

    // Public API
    return {
      position: config.position,
      rotation: config.rotation,
      rotationPost: config.rotationPost,
      skew: config.skew,
      scale: config.scale,
      scalePost: config.scalePost,
      opacity: config.opacity,
      width: config.width,
      height: config.height,


      clone: function() {
        return createState({
          position: this.position ? this.position.slice(0) : undefined,
          rotation: this.rotation ? this.rotation.slice(0) : undefined,
          rotationPost: this.rotationPost ? this.rotationPost.slice(0) : undefined,
          skew: this.skew ? this.skew.slice(0) : undefined,
          scale: this.scale ? this.scale.slice(0) : undefined,
          scalePost: this.scalePost ? this.scalePost.slice(0) : undefined,
          height: this.height,
          width: this.width,
          opacity: this.opacity
        });
      },

      asMatrix: function() {
        var m = matrix;
        m.clear();

        if(this.transformOrigin)
          m.translate(-this.transformOrigin[0], -this.transformOrigin[1], -this.transformOrigin[2]);

        if(this.scale) {
          m.scale(this.scale[0], this.scale[1]);
        }

        if(this.skew) {
          m.skew(this.skew[0], this.skew[1]);
        }

        if(this.rotation) {
          m.rotateX(this.rotation[0]);
          m.rotateY(this.rotation[1]);
          m.rotateZ(this.rotation[2]);
        }

        if(this.position) {
          m.translate(this.position[0], this.position[1], this.position[2]);
        }

        if(this.rotationPost) {
          m.rotateX(this.rotationPost[0]);
          m.rotateY(this.rotationPost[1]);
          m.rotateZ(this.rotationPost[2]);
        }

        if(this.scalePost) {
          m.scale(this.scalePost[0], this.scalePost[1]);
        }

        if(this.transformOrigin)
          m.translate(this.transformOrigin[0], this.transformOrigin[1], this.transformOrigin[2]);
        return m;
      },

      getProperties: function() {
        properties.opacity = this.opacity;
        properties.width = this.width + 'px';
        properties.height = this.height + 'px';
        return properties;
      }
    };
  };
  // ------------------
  // -- StateTweener -- 
  // -------------------

  var createStateTweener = function(startState, endState, resultState) {
    var start = startState;
    var end = endState;
    var result = resultState;
    
    var tweenPosition = end.position !== undefined;
    var tweenRotation = end.rotation !== undefined;
    var tweenRotationPost = end.rotationPost !== undefined;
    var tweenScale = end.scale !== undefined;
    var tweenSkew = end.skew !== undefined;
    var tweenWidth = end.width !== undefined;
    var tweenHeight = end.height !== undefined;
    var tweenOpacity = end.opacity !== undefined;

    // Public API
    return {

      tween: function(tweenValue) {

        if(tweenPosition) {
          var dX = (end.position[0] - start.position[0]);
          var dY = (end.position[1] - start.position[1]);
          var dZ = (end.position[2] - start.position[2]);
          result.position[0] = start.position[0] + tweenValue*dX;
          result.position[1] = start.position[1] + tweenValue*dY;
          result.position[2] = start.position[2] + tweenValue*dZ;
        }

        if(tweenRotation) {
          var dAX = (end.rotation[0] - start.rotation[0]);
          var dAY = (end.rotation[1] - start.rotation[1]);
          var dAZ = (end.rotation[2] - start.rotation[2]);
          result.rotation[0] = start.rotation[0] + tweenValue*dAX;
          result.rotation[1] = start.rotation[1] + tweenValue*dAY;
          result.rotation[2] = start.rotation[2] + tweenValue*dAZ;
        }

        if(tweenRotationPost) {
          var dBX = (end.rotationPost[0] - start.rotationPost[0]);
          var dBY = (end.rotationPost[1] - start.rotationPost[1]);
          var dBZ = (end.rotationPost[2] - start.rotationPost[2]);
          result.rotationPost[0] = start.rotationPost[0] + tweenValue*dBX;
          result.rotationPost[1] = start.rotationPost[1] + tweenValue*dBY;
          result.rotationPost[2] = start.rotationPost[2] + tweenValue*dBZ;
        }

        if(tweenSkew) {
          var dSX = (end.scale[0] - start.scale[0]);
          var dSY = (end.scale[1] - start.scale[1]);

          result.scale[0] = start.scale[0] + tweenValue*dSX;
          result.scale[1] = start.scale[1] + tweenValue*dSY;
        }

        if(tweenScale) {
          var dSkewX = (end.skew[0] - start.skew[0]);
          var dSkewY = (end.skew[1] - start.skew[1]);

          result.skew[0] = start.skew[0] + tweenValue*dSkewX;
          result.skew[1] = start.skew[1] + tweenValue*dSkewY;
        }

        if(tweenWidth) {
          var dWidth = (end.width - start.width);
          result.width = start.width + tweenValue*dWidth;
        }


        if(tweenHeight) {
          var dHeight = (end.height - start.height);
          result.height = start.height + tweenValue*dHeight;
        }

        if(tweenOpacity) {
          var dOpacity = (end.opacity - start.opacity);
          result.opacity = start.opacity + tweenValue*dOpacity;
        }

      },

      asMatrix: function() {
        return result.asMatrix();
      },

      getProperties: function() {
        return result.getProperties();
      },

      setReverse: function() {
        var oldStart = start;
        start = end;
        end = oldStart;
      }
    };
  };

  // ------------------------
  // -- ValueFeederTweener -- 
  // ------------------------

  var createValueFeederTweener = function(valueFeeder, startState, endState, resultState) {
    var currentMatrix = valueFeeder(0, createMatrix());
    var start = startState;
    var end = endState;
    var result = resultState;
    var reverse = false;


    // Public API
    return {

      tween: function(tweenValue) {
        if(reverse)
          tweenValue = 1 - tweenValue;
        currentMatrix.clear();
        currentMatrix = valueFeeder(tweenValue, currentMatrix);

        var dWidth = (end.width - start.width);
        var dHeight = (end.height - start.height);
        var dOpacity = (end.opacity - start.opacity);

        if(end.width !== undefined)
          result.width = start.width + tweenValue*dWidth;
        if(end.height !== undefined)
          result.height = start.height + tweenValue*dHeight;
        if(end.opacity !== undefined)
          result.opacity = start.opacity + tweenValue*dOpacity;
      },

      asMatrix: function() {
        return currentMatrix;
      },

      getProperties: function() {
        return result.getProperties();
      },

      setReverse: function() {
        reverse = true;
      }

    };
  };

  var optionOrDefault = function(option, def) {
    if(typeof option == 'undefined') {
      return def;
    }
    return option;
  };

  var updateElementTransform = function(element, matrix, perspective) {
    var cssPerspective = '';
    if(perspective) {
      cssPerspective = 'perspective(' + perspective + 'px) ';
    }
    var cssMatrix = matrix.asCSS();
    element.style[transformProperty] = cssPerspective + cssMatrix;
  };

  var updateElementProperties = function(element, properties) {
    for(var key in properties) {
      element.style[key] = properties[key];
    }
  };

  var isFunction = function(object) {
    return (typeof object === "function");
  };

  var cloneObject = function(object) {
    if(!object)
      return object;
    var clone = {};
    for(var key in object) {
      clone[key] = object[key];
    }
    return clone;
  };

  snabbt.createMatrix = createMatrix;
  snabbt.setElementTransform = updateElementTransform;
  return snabbt;
}());
var stackBlur = (function(){

	var mul_table = [
		512,512,456,512,328,456,335,512,405,328,271,456,388,335,292,512,
		454,405,364,328,298,271,496,456,420,388,360,335,312,292,273,512,
		482,454,428,405,383,364,345,328,312,298,284,271,259,496,475,456,
		437,420,404,388,374,360,347,335,323,312,302,292,282,273,265,512,
		497,482,468,454,441,428,417,405,394,383,373,364,354,345,337,328,
		320,312,305,298,291,284,278,271,265,259,507,496,485,475,465,456,
		446,437,428,420,412,404,396,388,381,374,367,360,354,347,341,335,
		329,323,318,312,307,302,297,292,287,282,278,273,269,265,261,512,
		505,497,489,482,475,468,461,454,447,441,435,428,422,417,411,405,
		399,394,389,383,378,373,368,364,359,354,350,345,341,337,332,328,
		324,320,316,312,309,305,301,298,294,291,287,284,281,278,274,271,
		268,265,262,259,257,507,501,496,491,485,480,475,470,465,460,456,
		451,446,442,437,433,428,424,420,416,412,408,404,400,396,392,388,
		385,381,377,374,370,367,363,360,357,354,350,347,344,341,338,335,
		332,329,326,323,320,318,315,312,310,307,304,302,299,297,294,292,
		289,287,285,282,280,278,275,273,271,269,267,265,263,261,259];


	var shg_table = [
		9, 11, 12, 13, 13, 14, 14, 15, 15, 15, 15, 16, 16, 16, 16, 17,
		17, 17, 17, 17, 17, 17, 18, 18, 18, 18, 18, 18, 18, 18, 18, 19,
		19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 20, 20, 20,
		20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 21,
		21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21,
		21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 22, 22, 22, 22, 22, 22,
		22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22,
		22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 23,
		23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23,
		23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23,
		23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23,
		23, 23, 23, 23, 23, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
		24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
		24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
		24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
		24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24 ];

	function getImageDataFromCanvas(canvas, top_x, top_y, width, height)
	{
		if (typeof(canvas) == 'string')
			canvas  = document.getElementById(canvas);
		else if (!canvas instanceof HTMLCanvasElement)
			return;

		var context = canvas.getContext('2d');
		var imageData;

		try {
			try {
				imageData = context.getImageData(top_x, top_y, width, height);
			} catch(e) {
				throw new Error("unable to access local image data: " + e);
				return;
			}
		} catch(e) {
			throw new Error("unable to access image data: " + e);
		}

		return imageData;
	}

	function processCanvasRGBA(canvas, top_x, top_y, width, height, radius)
	{
		if (isNaN(radius) || radius < 1) return;
		radius |= 0;

		var imageData = getImageDataFromCanvas(canvas, top_x, top_y, width, height);

		imageData = processImageDataRGBA(imageData, top_x, top_y, width, height, radius);

		canvas.getContext('2d').putImageData(imageData, top_x, top_y);
	}

	function processImageDataRGBA(imageData, top_x, top_y, width, height, radius)
	{
		var pixels = imageData.data;

		var x, y, i, p, yp, yi, yw, r_sum, g_sum, b_sum, a_sum,
			r_out_sum, g_out_sum, b_out_sum, a_out_sum,
			r_in_sum, g_in_sum, b_in_sum, a_in_sum,
			pr, pg, pb, pa, rbs;

		var div = radius + radius + 1;
		var w4 = width << 2;
		var widthMinus1  = width - 1;
		var heightMinus1 = height - 1;
		var radiusPlus1  = radius + 1;
		var sumFactor = radiusPlus1 * (radiusPlus1 + 1) / 2;

		var stackStart = new BlurStack();
		var stack = stackStart;
		for (i = 1; i < div; i++)
		{
			stack = stack.next = new BlurStack();
			if (i == radiusPlus1) var stackEnd = stack;
		}
		stack.next = stackStart;
		var stackIn = null;
		var stackOut = null;

		yw = yi = 0;

		var mul_sum = mul_table[radius];
		var shg_sum = shg_table[radius];

		for (y = 0; y < height; y++)
		{
			r_in_sum = g_in_sum = b_in_sum = a_in_sum = r_sum = g_sum = b_sum = a_sum = 0;

			r_out_sum = radiusPlus1 * (pr = pixels[yi]);
			g_out_sum = radiusPlus1 * (pg = pixels[yi+1]);
			b_out_sum = radiusPlus1 * (pb = pixels[yi+2]);
			a_out_sum = radiusPlus1 * (pa = pixels[yi+3]);

			r_sum += sumFactor * pr;
			g_sum += sumFactor * pg;
			b_sum += sumFactor * pb;
			a_sum += sumFactor * pa;

			stack = stackStart;

			for (i = 0; i < radiusPlus1; i++)
			{
				stack.r = pr;
				stack.g = pg;
				stack.b = pb;
				stack.a = pa;
				stack = stack.next;
			}

			for (i = 1; i < radiusPlus1; i++)
			{
				p = yi + ((widthMinus1 < i ? widthMinus1 : i) << 2);
				r_sum += (stack.r = (pr = pixels[p])) * (rbs = radiusPlus1 - i);
				g_sum += (stack.g = (pg = pixels[p+1])) * rbs;
				b_sum += (stack.b = (pb = pixels[p+2])) * rbs;
				a_sum += (stack.a = (pa = pixels[p+3])) * rbs;

				r_in_sum += pr;
				g_in_sum += pg;
				b_in_sum += pb;
				a_in_sum += pa;

				stack = stack.next;
			}


			stackIn = stackStart;
			stackOut = stackEnd;
			for (x = 0; x < width; x++)
			{
				pixels[yi+3] = pa = (a_sum * mul_sum) >> shg_sum;
				if (pa != 0)
				{
					pa = 255 / pa;
					pixels[yi]   = ((r_sum * mul_sum) >> shg_sum) * pa;
					pixels[yi+1] = ((g_sum * mul_sum) >> shg_sum) * pa;
					pixels[yi+2] = ((b_sum * mul_sum) >> shg_sum) * pa;
				} else {
					pixels[yi] = pixels[yi+1] = pixels[yi+2] = 0;
				}

				r_sum -= r_out_sum;
				g_sum -= g_out_sum;
				b_sum -= b_out_sum;
				a_sum -= a_out_sum;

				r_out_sum -= stackIn.r;
				g_out_sum -= stackIn.g;
				b_out_sum -= stackIn.b;
				a_out_sum -= stackIn.a;

				p =  (yw + ((p = x + radius + 1) < widthMinus1 ? p : widthMinus1)) << 2;

				r_in_sum += (stackIn.r = pixels[p]);
				g_in_sum += (stackIn.g = pixels[p+1]);
				b_in_sum += (stackIn.b = pixels[p+2]);
				a_in_sum += (stackIn.a = pixels[p+3]);

				r_sum += r_in_sum;
				g_sum += g_in_sum;
				b_sum += b_in_sum;
				a_sum += a_in_sum;

				stackIn = stackIn.next;

				r_out_sum += (pr = stackOut.r);
				g_out_sum += (pg = stackOut.g);
				b_out_sum += (pb = stackOut.b);
				a_out_sum += (pa = stackOut.a);

				r_in_sum -= pr;
				g_in_sum -= pg;
				b_in_sum -= pb;
				a_in_sum -= pa;

				stackOut = stackOut.next;

				yi += 4;
			}
			yw += width;
		}


		for (x = 0; x < width; x++)
		{
			g_in_sum = b_in_sum = a_in_sum = r_in_sum = g_sum = b_sum = a_sum = r_sum = 0;

			yi = x << 2;
			r_out_sum = radiusPlus1 * (pr = pixels[yi]);
			g_out_sum = radiusPlus1 * (pg = pixels[yi+1]);
			b_out_sum = radiusPlus1 * (pb = pixels[yi+2]);
			a_out_sum = radiusPlus1 * (pa = pixels[yi+3]);

			r_sum += sumFactor * pr;
			g_sum += sumFactor * pg;
			b_sum += sumFactor * pb;
			a_sum += sumFactor * pa;

			stack = stackStart;

			for (i = 0; i < radiusPlus1; i++)
			{
				stack.r = pr;
				stack.g = pg;
				stack.b = pb;
				stack.a = pa;
				stack = stack.next;
			}

			yp = width;

			for (i = 1; i <= radius; i++)
			{
				yi = (yp + x) << 2;

				r_sum += (stack.r = (pr = pixels[yi])) * (rbs = radiusPlus1 - i);
				g_sum += (stack.g = (pg = pixels[yi+1])) * rbs;
				b_sum += (stack.b = (pb = pixels[yi+2])) * rbs;
				a_sum += (stack.a = (pa = pixels[yi+3])) * rbs;

				r_in_sum += pr;
				g_in_sum += pg;
				b_in_sum += pb;
				a_in_sum += pa;

				stack = stack.next;

				if(i < heightMinus1)
				{
					yp += width;
				}
			}

			yi = x;
			stackIn = stackStart;
			stackOut = stackEnd;
			for (y = 0; y < height; y++)
			{
				p = yi << 2;
				pixels[p+3] = pa = (a_sum * mul_sum) >> shg_sum;
				if (pa > 0)
				{
					pa = 255 / pa;
					pixels[p]   = ((r_sum * mul_sum) >> shg_sum) * pa;
					pixels[p+1] = ((g_sum * mul_sum) >> shg_sum) * pa;
					pixels[p+2] = ((b_sum * mul_sum) >> shg_sum) * pa;
				} else {
					pixels[p] = pixels[p+1] = pixels[p+2] = 0;
				}

				r_sum -= r_out_sum;
				g_sum -= g_out_sum;
				b_sum -= b_out_sum;
				a_sum -= a_out_sum;

				r_out_sum -= stackIn.r;
				g_out_sum -= stackIn.g;
				b_out_sum -= stackIn.b;
				a_out_sum -= stackIn.a;

				p = (x + (((p = y + radiusPlus1) < heightMinus1 ? p : heightMinus1) * width)) << 2;

				r_sum += (r_in_sum += (stackIn.r = pixels[p]));
				g_sum += (g_in_sum += (stackIn.g = pixels[p+1]));
				b_sum += (b_in_sum += (stackIn.b = pixels[p+2]));
				a_sum += (a_in_sum += (stackIn.a = pixels[p+3]));

				stackIn = stackIn.next;

				r_out_sum += (pr = stackOut.r);
				g_out_sum += (pg = stackOut.g);
				b_out_sum += (pb = stackOut.b);
				a_out_sum += (pa = stackOut.a);

				r_in_sum -= pr;
				g_in_sum -= pg;
				b_in_sum -= pb;
				a_in_sum -= pa;

				stackOut = stackOut.next;

				yi += width;
			}
		}
		return imageData;
	}

	function BlurStack()
	{
		this.r = 0;
		this.g = 0;
		this.b = 0;
		this.a = 0;
		this.next = null;
	}

	return processCanvasRGBA;

}());

// custom event polyfill for IE10
'use strict';

var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ('value' in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } }

(function () {
    function CustomEvent(event, params) {
        params = params || { bubbles: false, cancelable: false, detail: undefined };
        var evt = document.createEvent('CustomEvent');
        evt.initCustomEvent(event, params.bubbles, params.cancelable, params.detail);
        return evt;
    }
    CustomEvent.prototype = window.CustomEvent.prototype;
    window.CustomEvent = CustomEvent;
})();

// canvas to blob polyfill
// https://developer.mozilla.org/en-US/docs/Web/API/HTMLCanvasElement/toBlob#Polyfill
if (!HTMLCanvasElement.prototype.toBlob) {
    Object.defineProperty(HTMLCanvasElement.prototype, 'toBlob', {
        value: function value(callback, type, quality) {

            var binStr = atob(this.toDataURL(type, quality).split(',')[1]),
                len = binStr.length,
                arr = new Uint8Array(len);

            for (var i = 0; i < len; i++) {
                arr[i] = binStr.charCodeAt(i);
            }

            callback(new Blob([arr], { type: type || 'image/png' }));
        }
    });
}

function getElementAttributes(el) {
    return Array.prototype.slice.call(el.attributes).map(function (attr) {
        return { 'name': attr.name, 'value': attr.value };
    });
}

// helper method
function getOffsetByEvent(e) {
    return {
        x: typeof e.offsetX === 'undefined' ? e.layerX : e.offsetX,
        y: typeof e.offsetY === 'undefined' ? e.layerY : e.offsetY
    };
}

// merge two objects together
function mergeOptions(base, additives) {

    var key;
    var options = {};
    var optionsToMerge = additives || {};

    for (key in base) {
        if (!base.hasOwnProperty(key)) {
            continue;
        }
        options[key] = typeof optionsToMerge[key] === 'undefined' ? base[key] : optionsToMerge[key];
    }

    return options;
}

// keys
var Key = {
    ESC: 27,
    RETURN: 13
};

// pointer events
var Events = {
    DOWN: ['touchstart', 'pointerdown', 'mousedown'],
    MOVE: ['touchmove', 'pointermove', 'mousemove'],
    UP: ['touchend', 'touchcancel', 'pointerup', 'mouseup']
};

// shortcuts
function create(name, className) {
    var node = document.createElement(name);
    if (className) {
        node.className = className;
    }
    return node;
}

// events
function addEvents(obj, events, scope) {
    events.forEach(function (event) {
        obj.addEventListener(event, scope, false);
    });
}

function removeEvents(obj, events, scope) {
    events.forEach(function (event) {
        obj.removeEventListener(event, scope, false);
    });
}

function getEventOffset(e) {

    var event = e.changedTouches ? e.changedTouches[0] : e;

    // no event found, quit!
    if (!event) {
        return;
    }

    // get offset from events
    return {
        x: event.pageX,
        y: event.pageY
    };
}

function getEventOffsetLocal(e, local) {

    var offset = getEventOffset(e);
    var rect = local.getBoundingClientRect();
    var top = window.pageYOffset || document.documentElement.scrollTop;
    var left = window.pageXOffset || document.documentElement.scrollLeft;

    return {
        x: offset.x - rect.left - left,
        y: offset.y - rect.top - top
    };
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function last(array) {
    return array[array.length - 1];
}

function limit(value, min, max) {
    return Math.max(min, Math.min(max, value));
}

function cloneRect(rect) {
    return {
        x: rect.x,
        y: rect.y,
        width: rect.width,
        height: rect.height
    };
}

function inArray(needle, arr) {
    return arr.indexOf(needle) !== -1;
}

function getExtensionFromFileName(fileName) {
    return fileName.split('.').pop().toLowerCase();
}

function urlToImage(url) {
    var img = new Image();
    img.src = url;
    return img;
}

function imageToData(img) {
    var canvas;
    var ctx;
    var dataURL;

    canvas = document.createElement('canvas');
    canvas.width = img.naturalWidth;
    canvas.height = img.naturalHeight;
    ctx = canvas.getContext('2d');
    ctx.drawImage(img, 0, 0);
    dataURL = canvas.toDataURL();
    return dataURL;
}

function send(url, data, progress, success, err) {

    var xhr = new XMLHttpRequest();

    if (progress) {
        xhr.upload.addEventListener('progress', function (e) {
            progress(e.loaded, e.total);
        });
    }

    xhr.open('POST', url, true);

    xhr.onreadystatechange = function () {

        if (xhr.readyState === 4 && xhr.status === 200) {

            var text = xhr.responseText;

            // if no data returned from server assume success
            if (!text.length) {
                success();
                return;
            }

            // catch possible PHP content length problem
            if (text.indexOf('Content-Length') !== -1) {
                err('file-too-big');
                return;
            }

            // if data returned it should be in suggested JSON format
            var obj = null;
            try {
                obj = JSON.parse(xhr.responseText);
            } catch (e) {}

            success(obj || text);
        } else if (xhr.readyState === 4) {
            err('fail');
        }
    };

    xhr.send(data);
}

function resetTransforms(element) {
    element.style.transform = '';
}

function revealElement(element, duration) {
    snabbt(element, {
        fromOpacity: 0,
        opacity: 1,
        duration: duration,
        complete: function complete() {
            resetTransforms(this);
        }
    });
}

function bytesToMegaBytes(b) {
    return b / 1000000;
}

function megaBytesToBytes(mb) {
    return mb * 1000000;
}

var mimetypes = {
    'jpeg': 'image/jpeg',
    'jpg': 'image/jpeg',
    'jpe': 'image/jpeg',
    'png': 'image/png',
    'gif': 'image/gif',
    'bmp': 'image/bmp'
};

function getCommonMimeTypes() {
    var types = [];
    var type = undefined;
    var mimetype = undefined;
    for (type in mimetypes) {
        mimetype = mimetypes[type];
        if (types.indexOf(mimetype) == -1) {
            types.push(mimetype);
        }
    }
    return types;
}

function getExtensionByMimeType(mimetype) {
    var type = undefined;
    for (type in mimetypes) {
        if (mimetypes[type] === mimetype) {
            return type;
        }
    }
    return mimetype;
}

function getFileMimeType(extension) {
    return mimetypes[extension] || 'unknown';
}

function getFileMetaData(file) {

    if (typeof file === 'string') {

        // test if is data uri
        if (/^data:image/.test(file)) {
            return {
                name: 'unknown',
                type: getMimeTypeFromDataURI(file),
                size: null
            };
        }

        // is url
        return {
            name: file.split('/').pop(),
            type: getFileMimeType(file.split('.').pop()),
            size: null
        };
    }

    return {
        name: file.name,
        type: file.type,
        size: file.size
    };
}

function getImage(src) {

    return loadImage(src);
}

function getImageAsCanvas(src, callback) {

    loadImage.parseMetaData(src, function (meta) {

        var options = {
            canvas: true,
            crossOrigin: true
        };

        if (meta.exif) {
            options.orientation = meta.exif.get('Orientation');
        }

        loadImage(src, function (res) {

            if (res.type === 'error') {
                callback();
                return;
            }

            callback(res, meta);
        }, options);
    });
}

function getAutoCropRect(width, height, ratioOut) {

    var x,
        y,
        w,
        h,
        ratioIn = height / width;

    // if input is portrait and required is landscape
    // width is portrait width, height is width times outputRatio
    if (ratioIn < ratioOut) {
        h = height;
        w = h / ratioOut;
        x = (width - w) * .5;
        y = 0;
    }

    // if input is landscape and required is portrait
    // height is landscape height, width is height divided by outputRatio
    else {
            w = width;
            h = w * ratioOut;
            x = 0;
            y = (height - h) * .5;
        }

    return {
        x: x,
        y: y,
        height: h,
        width: w
    };
}

function cropImage(src, callback, rect) {

    if ('toDataURL' in src) {
        src = src.toDataURL();
    }

    loadImage(src, function (image) {
        callback(image);
    }, {
        canvas: true,
        left: rect.x,
        top: rect.y,
        sourceWidth: rect.width,
        sourceHeight: rect.height
    });
}

function transformCanvas(canvas, transforms, cb) {
    if (transforms === undefined) transforms = {};

    var result = create('canvas');

    var space = {
        width: canvas.width,
        height: canvas.height
    };

    var crop = transforms.crop;
    var size = transforms.size;

    // do crop transforms
    if (crop) {

        result.width = crop.width;
        result.height = crop.height;

        // limit crop to size of canvas else safari might return transparant image
        crop = roundRect(crop);
        if (crop.y + crop.height > space.height) {
            crop.y = Math.max(0, space.height - crop.height);
        }
        if (crop.x + crop.width > space.width) {
            crop.x = Math.max(0, space.width - crop.width);
        }

        var ctx = result.getContext('2d');
        ctx.drawImage(canvas, crop.x, crop.y, crop.width, crop.height, 0, 0, crop.width, crop.height);
    }

    // do size transforms
    if (size) {

        // pick smallest scalar
        scaleCanvas(result, Math.min(size.width / result.width, size.height / result.height));
    }

    cb(result);
}

function cropCanvas(canvas, callback, rect) {

    var result = create('canvas');
    result.width = rect.width;
    result.height = rect.height;
    var ctx = result.getContext('2d');
    ctx.drawImage(canvas, rect.x, rect.y, rect.width, rect.height, 0, 0, rect.width, rect.height);

    callback(result);
}

function scaleCanvas(canvas, scalar) {

    // if not scaling down, bail out
    if (scalar >= 1) {
        return;
    }

    var c = cloneCanvas(canvas);
    var ctx;
    var width = canvas.width;
    var height = canvas.height;
    var targetWidth = Math.ceil(canvas.width * scalar);
    var targetHeight = Math.ceil(canvas.height * scalar);

    // scale down in steps
    while (width > targetWidth) {

        width *= .5;
        height *= .5;

        if (width < targetWidth) {
            // skip to final draw
            break;
        }

        c = create('canvas');
        c.width = width;
        c.height = height;
        ctx = c.getContext('2d');
        ctx.drawImage(canvas, 0, 0, width, height);
    }

    // draw final result back to original canvas
    canvas.width = targetWidth;
    canvas.height = targetHeight;
    ctx = canvas.getContext('2d');
    ctx.drawImage(c, 0, 0, targetWidth, targetHeight);
}

function cloneCanvas(original) {
    return cloneCanvasScaled(original, 1);
}

function cloneCanvasScaled(original, scalar) {

    if (!original) {
        return null;
    }

    var duplicate = document.createElement('canvas');
    duplicate.setAttribute('data-file', original.getAttribute('data-file'));
    var ctx = duplicate.getContext('2d');
    duplicate.width = original.width;
    duplicate.height = original.height;
    ctx.drawImage(original, 0, 0);
    if (scalar > 0 && scalar != 1) {
        scaleCanvas(duplicate, scalar);
    }
    return duplicate;
}

function canvasHasDimensions(canvas) {
    return canvas.width && canvas.height;
}

function copyCanvas(original, destination) {

    var ctx = destination.getContext('2d');
    if (canvasHasDimensions(destination)) {
        ctx.drawImage(original, 0, 0, destination.width, destination.height);
    } else {
        destination.width = original.width;
        destination.height = original.height;
        ctx.drawImage(original, 0, 0);
    }
}

function clearCanvas(canvas) {
    var ctx = canvas.getContext('2d');
    ctx.clearRect(0, 0, canvas.width, canvas.height);
}

function blurCanvas(canvas) {
    stackBlur(canvas, 0, 0, canvas.width, canvas.height, 3);
}

function rotateCanvas(original) {

    var canvas = document.createElement('canvas');
    var ctx = canvas.getContext('2d');
    var widthHalf = original.width * .5;
    var heightHalf = original.height * .5;

    canvas.width = original.height;
    canvas.height = original.width;

    clearCanvas(canvas);

    ctx.translate(heightHalf, widthHalf);
    ctx.rotate(90 * Math.PI / 180);
    ctx.drawImage(original, -widthHalf, -heightHalf);

    return canvas;
}

function scaleRect(rect, scalar) {
    return {
        x: rect.x * scalar,
        y: rect.y * scalar,
        width: rect.width * scalar,
        height: rect.height * scalar
    };
}

function roundRect(rect) {
    return {
        x: Math.floor(rect.x),
        y: Math.floor(rect.y),
        width: Math.floor(rect.width),
        height: Math.floor(rect.height)
    };
}

function resetFileInput(input) {

    // no value, no need to reset
    if (!input || input.value === '') {
        return;
    }

    try {
        // for modern browsers
        input.value = '';
    } catch (err) {}

    // for IE10
    if (input.value) {

        // quickly append input to temp form and reset form
        var form = document.createElement('form');
        var parentNode = input.parentNode;
        var ref = input.nextSibling;
        form.appendChild(input);
        form.reset();

        // re-inject input where it originally was
        if (ref) {
            parentNode.insertBefore(input, ref);
        } else {
            parentNode.appendChild(input);
        }
    }
}

function limit(value, min, max) {
    return Math.min(Math.max(value, min), max);
}

function clone(obj) {
    if (!obj) {
        return obj;
    }
    return JSON.parse(JSON.stringify(obj));
}

function cloneData(obj) {

    var input = cloneCanvas(obj.input.image);
    var output = cloneCanvas(obj.output.image);
    var dupe = clone(obj);
    dupe.input.image = input;
    dupe.output.image = output;
    return dupe;
}

function getMimeTypeFromDataURI(dataUri) {
    if (!dataUri) {
        return null;
    }
    var matches = dataUri.match(/^.+;/);
    if (matches.length) {
        return matches[0].substring(5, matches[0].length - 1);
    }
    return null;
}

function flattenData(obj) {
    var props = arguments.length <= 1 || arguments[1] === undefined ? [] : arguments[1];

    var type = null;

    var data = {
        server: clone(obj.server),
        meta: clone(obj.meta),
        input: {
            name: obj.input.name,
            type: obj.input.type,
            size: obj.input.size,
            width: obj.input.width,
            height: obj.input.height
        },
        output: {
            width: obj.output.width,
            height: obj.output.height
        }
    };

    if (inArray('input', props)) {
        data.input.image = obj.input.image.toDataURL(obj.input.type, 1.0);
    }

    if (inArray('output', props)) {
        data.output.image = obj.output.image.toDataURL(obj.input.type, 1.0);
    }

    if (inArray('actions', props)) {
        data.actions = clone(obj.actions);
    }

    // correct extension and type if was converted to .png (could happen on older browser)
    type = getMimeTypeFromDataURI(data.output.image || data.input.image);
    if (type === 'image/png') {
        var _name = data.input.name;
        data.input.name = _name.substr(0, _name.lastIndexOf('.')) + '.png';
        data.input.type = type;
    }

    return data;
}

function toggleDisplayBySelector(selector, enabled, root) {
    var node = root.querySelector(selector);
    if (!node) {
        return;
    }
    node.style.display = enabled ? '' : 'none';
}

function getAttributeAsInt(element, attr) {
    return parseInt(element.getAttribute(attr), 10);
}

function nodeListToArray(nl) {
    return Array.prototype.slice.call(nl);
}

function removeElement(el) {
    el.parentNode.removeChild(el);
}

function wrap(element) {
    var wrapper = create('div');
    if (element.parentNode) {
        if (element.nextSibling) {
            element.parentNode.insertBefore(wrapper, element.nextSibling);
        } else {
            element.parentNode.appendChild(wrapper);
        }
    }
    wrapper.appendChild(element);
    return wrapper;
}

function polarToCartesian(centerX, centerY, radius, angleInDegrees) {
    var angleInRadians = (angleInDegrees - 90) * Math.PI / 180.0;

    return {
        x: centerX + radius * Math.cos(angleInRadians),
        y: centerY + radius * Math.sin(angleInRadians)
    };
}

function describeArc(x, y, radius, startAngle, endAngle) {

    var start = polarToCartesian(x, y, radius, endAngle);
    var end = polarToCartesian(x, y, radius, startAngle);

    var arcSweep = endAngle - startAngle <= 180 ? '0' : '1';

    var d = ['M', start.x, start.y, 'A', radius, radius, 0, arcSweep, 0, end.x, end.y].join(' ');

    return d;
}

function percentageArc(x, y, radius, p) {
    return describeArc(x, y, radius, 0, p * 360);
}
var resizers = {
    'n': function n(rect, offset, space, ratio) {

        var t, r, b, l, w, h, p, d;

        // bottom is fixed
        b = rect.y + rect.height;

        // intended top
        t = limit(offset.y, 0, b);

        // if is too small vertically
        if (b - t < space.min.height) {
            t = b - space.min.height;
        }

        // if should scale by ratio, pick width by ratio of new height
        w = ratio ? (b - t) / ratio : rect.width;

        // check if has fallen below min width or height
        if (w < space.min.width) {
            w = space.min.width;
            t = b - w * ratio;
        }

        // add half to left and half to right edge
        p = (w - rect.width) * .5;
        l = rect.x - p;
        r = rect.x + rect.width + p;

        // check if any of the edges has moved out of the available space, if so,
        // set max size of rectangle from original position
        if (l < 0 || r > space.width) {

            // smallest distance to edge of space
            d = Math.min(rect.x, space.width - (rect.x + rect.width));

            // new left and right offsets
            l = rect.x - d;
            r = rect.x + rect.width + d;

            // resulting width
            w = r - l;

            // resulting height based on ratio
            h = w * ratio;

            // new top position
            t = b - h;
        }

        return {
            x: l,
            y: t,
            width: r - l,
            height: b - t
        };
    },
    's': function s(rect, offset, space, ratio) {

        var t, r, b, l, w, h, p, d;

        // top is fixed
        t = rect.y;

        // intended bottom
        b = limit(offset.y, t, space.height);

        // if is too small vertically
        if (b - t < space.min.height) {
            b = t + space.min.height;
        }

        // if should scale by ratio, pick width by ratio of new height
        w = ratio ? (b - t) / ratio : rect.width;

        // check if has fallen below min width or height
        if (w < space.min.width) {
            w = space.min.width;
            b = t + w * ratio;
        }

        // add half to left and half to right edge
        p = (w - rect.width) * .5;
        l = rect.x - p;
        r = rect.x + rect.width + p;

        // check if any of the edges has moved out of the available space, if so,
        // set max size of rectangle from original position
        if (l < 0 || r > space.width) {

            // smallest distance to edge of space
            d = Math.min(rect.x, space.width - (rect.x + rect.width));

            // new left and right offsets
            l = rect.x - d;
            r = rect.x + rect.width + d;

            // resulting width
            w = r - l;

            // resulting height based on ratio
            h = w * ratio;

            // new bottom position
            b = t + h;
        }

        return {
            x: l,
            y: t,
            width: r - l,
            height: b - t
        };
    },
    'e': function e(rect, offset, space, ratio) {

        var t, r, b, l, w, h, p, d;

        // left is fixed
        l = rect.x;

        // intended right edge
        r = limit(offset.x, l, space.width);

        // if is too small vertically
        if (r - l < space.min.width) {
            r = l + space.min.width;
        }

        // if should scale by ratio, pick height by ratio of new width
        h = ratio ? (r - l) * ratio : rect.height;

        // check if has fallen below min width or height
        if (h < space.min.height) {
            h = space.min.height;
            r = l + h / ratio;
        }

        // add half to top and bottom
        p = (h - rect.height) * .5;
        t = rect.y - p;
        b = rect.y + rect.height + p;

        // check if any of the edges has moved out of the available space, if so,
        // set max size of rectangle from original position
        if (t < 0 || b > space.height) {

            // smallest distance to edge of space
            d = Math.min(rect.y, space.height - (rect.y + rect.height));

            // new top and bottom offsets
            t = rect.y - d;
            b = rect.y + rect.height + d;

            // resulting height
            h = b - t;

            // resulting width based on ratio
            w = h / ratio;

            // new right position
            r = l + w;
        }

        return {
            x: l,
            y: t,
            width: r - l,
            height: b - t
        };
    },
    'w': function w(rect, offset, space, ratio) {

        var t, r, b, l, w, h, p, d;

        // right is fixed
        r = rect.x + rect.width;

        // intended left edge
        l = limit(offset.x, 0, r);

        // if is too small vertically
        if (r - l < space.min.width) {
            l = r - space.min.width;
        }

        // if should scale by ratio, pick height by ratio of new width
        h = ratio ? (r - l) * ratio : rect.height;

        // check if has fallen below min width or height
        if (h < space.min.height) {
            h = space.min.height;
            l = r - h / ratio;
        }

        // add half to top and bottom
        p = (h - rect.height) * .5;
        t = rect.y - p;
        b = rect.y + rect.height + p;

        // check if any of the edges has moved out of the available space, if so,
        // set max size of rectangle from original position
        if (t < 0 || b > space.height) {

            // smallest distance to edge of space
            d = Math.min(rect.y, space.height - (rect.y + rect.height));

            // new top and bottom offsets
            t = rect.y - d;
            b = rect.y + rect.height + d;

            // resulting height
            h = b - t;

            // resulting width based on ratio
            w = h / ratio;

            // new right position
            l = r - w;
        }

        return {
            x: l,
            y: t,
            width: r - l,
            height: b - t
        };
    },
    'ne': function ne(rect, offset, space, ratio) {

        var t, r, b, l, w, h, d;

        // left and bottom are fixed
        l = rect.x;
        b = rect.y + rect.height;

        // intended right edge
        r = limit(offset.x, l, space.width);

        // if is too small vertically
        if (r - l < space.min.width) {
            r = l + space.min.width;
        }

        // if should scale by ratio, pick height by ratio of new width
        h = ratio ? (r - l) * ratio : limit(b - offset.y, space.min.height, b);

        // check if has fallen below min width or height
        if (h < space.min.height) {
            h = space.min.height;
            r = l + h / ratio;
        }

        // add height difference with original height to top
        t = rect.y - (h - rect.height);

        // check if any of the edges has moved out of the available space, if so,
        // set max size of rectangle from original position
        if (t < 0 || b > space.height) {

            // smallest distance to edge of space
            d = Math.min(rect.y, space.height - (rect.y + rect.height));

            // new top and bottom offsets
            t = rect.y - d;

            // resulting height
            h = b - t;

            // resulting width based on ratio
            w = h / ratio;

            // new right position
            r = l + w;
        }

        return {
            x: l,
            y: t,
            width: r - l,
            height: b - t
        };
    },
    'se': function se(rect, offset, space, ratio) {

        var t, r, b, l, w, h, d;

        // left and top are fixed
        l = rect.x;
        t = rect.y;

        // intended right edge
        r = limit(offset.x, l, space.width);

        // if is too small vertically
        if (r - l < space.min.width) {
            r = l + space.min.width;
        }

        // if should scale by ratio, pick height by ratio of new width
        h = ratio ? (r - l) * ratio : limit(offset.y - rect.y, space.min.height, space.height - t);

        // check if has fallen below min width or height
        if (h < space.min.height) {
            h = space.min.height;
            r = l + h / ratio;
        }

        // add height difference with original height to bottom
        b = rect.y + rect.height + (h - rect.height);

        // check if any of the edges has moved out of the available space, if so,
        // set max size of rectangle from original position
        if (t < 0 || b > space.height) {

            // smallest distance to edge of space
            d = Math.min(rect.y, space.height - (rect.y + rect.height));

            // new bottom offset
            b = rect.y + rect.height + d;

            // resulting height
            h = b - t;

            // resulting width based on ratio
            w = h / ratio;

            // new right position
            r = l + w;
        }

        return {
            x: l,
            y: t,
            width: r - l,
            height: b - t
        };
    },
    'sw': function sw(rect, offset, space, ratio) {

        var t, r, b, l, w, h, d;

        // right and top are fixed
        r = rect.x + rect.width;
        t = rect.y;

        // intended left edge
        l = limit(offset.x, 0, r);

        // if is too small vertically
        if (r - l < space.min.width) {
            l = r - space.min.width;
        }

        // if should scale by ratio, pick height by ratio of new width
        h = ratio ? (r - l) * ratio : limit(offset.y - rect.y, space.min.height, space.height - t);

        // check if has fallen below min width or height
        if (h < space.min.height) {
            h = space.min.height;
            l = r - h / ratio;
        }

        // add height difference with original height to bottom
        b = rect.y + rect.height + (h - rect.height);

        // check if any of the edges has moved out of the available space, if so,
        // set max size of rectangle from original position
        if (t < 0 || b > space.height) {

            // smallest distance to edge of space
            d = Math.min(rect.y, space.height - (rect.y + rect.height));

            // new bottom offset
            b = rect.y + rect.height + d;

            // resulting height
            h = b - t;

            // resulting width based on ratio
            w = h / ratio;

            // new left position
            l = r - w;
        }

        return {
            x: l,
            y: t,
            width: r - l,
            height: b - t
        };
    },
    'nw': function nw(rect, offset, space, ratio) {

        var t, r, b, l, w, h, d;

        // right and bottom are fixed
        r = rect.x + rect.width;
        b = rect.y + rect.height;

        // intended left edge
        l = limit(offset.x, 0, r);

        // if is too small vertically
        if (r - l < space.min.width) {
            l = r - space.min.width;
        }

        // if should scale by ratio, pick height by ratio of new width
        h = ratio ? (r - l) * ratio : limit(b - offset.y, space.min.height, b);

        // check if has fallen below min width or height
        if (h < space.min.height) {
            h = space.min.height;
            l = r - h / ratio;
        }

        // add height difference with original height to bottom
        t = rect.y - (h - rect.height);

        // check if any of the edges has moved out of the available space, if so,
        // set max size of rectangle from original position
        if (t < 0 || b > space.height) {

            // smallest distance to edge of space
            d = Math.min(rect.y, space.height - (rect.y + rect.height));

            // new bottom offset
            t = rect.y - d;

            // resulting height
            h = b - t;

            // resulting width based on ratio
            w = h / ratio;

            // new left position
            l = r - w;
        }

        return {
            x: l,
            y: t,
            width: r - l,
            height: b - t
        };
    }

};

/**
 * CropArea
 */

var CropArea = (function () {
    function CropArea() {
        var element = arguments.length <= 0 || arguments[0] === undefined ? document.createElement('div') : arguments[0];

        _classCallCheck(this, CropArea);

        this._element = element;

        this._interaction = null;

        this._minWidth = 0;
        this._minHeight = 0;

        this._ratio = null;

        this._rect = {
            x: 0,
            y: 0,
            width: 0,
            height: 0
        };

        this._space = {
            width: 0,
            height: 0
        };

        this._rectChanged = false;

        this._init();
    }

    /**
     * ImageEditor
     * @param element
     * @param options
     * @constructor
     */

    _createClass(CropArea, [{
        key: '_init',
        value: function _init() {

            this._element.className = 'slim-crop-area';

            // lines
            var lines = create('div', 'grid');
            this._element.appendChild(lines);

            // corner & edge resize buttons
            for (var handler in resizers) {
                if (!resizers.hasOwnProperty(handler)) {
                    continue;
                }
                var _btn = create('button', handler);
                this._element.appendChild(_btn);
            }
            var btn = create('button', 'c');
            this._element.appendChild(btn);

            addEvents(document, Events.DOWN, this);
        }
    }, {
        key: 'reset',
        value: function reset() {

            this._interaction = null;

            this._rect = {
                x: 0,
                y: 0,
                width: 0,
                height: 0
            };

            this._rectChanged = true;

            this._redraw();

            this._element.dispatchEvent(new CustomEvent('change'));
        }
    }, {
        key: 'rescale',
        value: function rescale(scale) {

            // no rescale
            if (scale === 1) {
                return;
            }

            this._interaction = null;

            this._rectChanged = true;

            this._rect.x *= scale;
            this._rect.y *= scale;
            this._rect.width *= scale;
            this._rect.height *= scale;

            this._redraw();

            this._element.dispatchEvent(new CustomEvent('change'));
        }
    }, {
        key: 'limit',
        value: function limit(width, height) {
            this._space = {
                width: width,
                height: height
            };
        }
    }, {
        key: 'resize',
        value: function resize(x, y, width, height) {

            this._interaction = null;

            this._rect = {
                x: x,
                y: y,
                width: limit(width, 0, this._space.width),
                height: limit(height, 0, this._space.height)
            };

            this._rectChanged = true;

            this._redraw();

            this._element.dispatchEvent(new CustomEvent('change'));
        }
    }, {
        key: 'handleEvent',
        value: function handleEvent(e) {

            switch (e.type) {

                case 'touchstart':
                case 'pointerdown':
                case 'mousedown':
                    {
                        this._onStartDrag(e);
                    }
                    break;
                case 'touchmove':
                case 'pointermove':
                case 'mousemove':
                    {
                        this._onDrag(e);
                    }
                    break;
                case 'touchend':
                case 'touchcancel':
                case 'pointerup':
                case 'mouseup':
                    {
                        this._onStopDrag(e);
                    }

            }
        }
    }, {
        key: '_onStartDrag',
        value: function _onStartDrag(e) {

            // is not my event?
            if (!this._element.contains(e.target)) {
                return;
            }

            e.preventDefault();

            // listen to drag related events
            addEvents(document, Events.MOVE, this);
            addEvents(document, Events.UP, this);

            // now interacting with control
            this._interaction = {
                type: e.target.className,
                offset: getEventOffsetLocal(e, this._element)
            };

            // now dragging
            this._element.setAttribute('data-dragging', 'true');

            // start the redraw update loop
            this._redraw();
        }
    }, {
        key: '_onDrag',
        value: function _onDrag(e) {

            e.preventDefault();

            // get local offset for this event
            var offset = getEventOffsetLocal(e, this._element.parentNode);
            var type = this._interaction.type;

            // drag
            if (type === 'c') {

                this._rect.x = limit(offset.x - this._interaction.offset.x, 0, this._space.width - this._rect.width);
                this._rect.y = limit(offset.y - this._interaction.offset.y, 0, this._space.height - this._rect.height);
            }
            // resize
            else if (resizers[type]) {

                    this._rect = resizers[type](this._rect, offset, {
                        x: 0,
                        y: 0,
                        width: this._space.width,
                        height: this._space.height,
                        min: {
                            width: this._minWidth,
                            height: this._minHeight
                        }
                    }, this._ratio);
                }

            this._rectChanged = true;

            // dispatch
            this._element.dispatchEvent(new CustomEvent('input'));
        }
    }, {
        key: '_onStopDrag',
        value: function _onStopDrag(e) {

            e.preventDefault();

            // stop listening to drag related events
            removeEvents(document, Events.MOVE, this);
            removeEvents(document, Events.UP, this);

            // no longer interacting, so no need to redraw
            this._interaction = null;

            // now dragging
            this._element.setAttribute('data-dragging', 'false');

            // fire change event
            this._element.dispatchEvent(new CustomEvent('change'));
        }
    }, {
        key: '_redraw',
        value: function _redraw() {
            var _this = this;

            if (this._rectChanged) {

                this._element.style.cssText = '\n                left:' + this._rect.x + 'px;\n                top:' + this._rect.y + 'px;\n                width:' + this._rect.width + 'px;\n                height:' + this._rect.height + 'px;\n            ';

                this._rectChanged = false;
            }

            // if no longer interacting with crop area stop here
            if (!this._interaction) {
                return;
            }

            // redraw
            requestAnimationFrame(function () {
                return _this._redraw();
            });
        }
    }, {
        key: 'destroy',
        value: function destroy() {

            this._interaction = false;
            this._rectChanged = false;

            removeEvents(document, Events.DOWN, this);
            removeEvents(document, Events.MOVE, this);
            removeEvents(document, Events.UP, this);

            removeElement(this._element);
        }
    }, {
        key: 'element',
        get: function get() {
            return this._element;
        }
    }, {
        key: 'area',
        get: function get() {
            return this._rect;
        }
    }, {
        key: 'dirty',
        get: function get() {
            return this._rect.x !== 0 || this._rect.y !== 0 || this._rect.width !== 0 || this._rect.height !== 0;
        }
    }, {
        key: 'minWidth',
        set: function set(value) {
            this._minWidth = value;
        }
    }, {
        key: 'minHeight',
        set: function set(value) {
            this._minHeight = value;
        }
    }, {
        key: 'ratio',
        set: function set(value) {
            this._ratio = value;
        }
    }]);

    return CropArea;
})();

var ImageEditorButtons = ['cancel', 'confirm'];

var ImageCropperEvents = ['input', 'change'];

var ImageEditor = (function () {
    function ImageEditor() {
        var element = arguments.length <= 0 || arguments[0] === undefined ? document.createElement('div') : arguments[0];
        var options = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];

        _classCallCheck(this, ImageEditor);

        this._element = element;
        this._options = mergeOptions(ImageEditor.options(), options);

        this._ratio = null;
        this._output = null;

        this._input = null;

        this._preview = null;
        this._previewBlurred = null;
        this._blurredPreview = false;

        this._cropper = null;
        this._previewWrapper = null;
        this._currentWindowSize = {};

        this._btnGroup = null;

        this._init();
    }

    /**
     * FileHopper
     * @param element
     * @param options
     * @constructor
     */

    _createClass(ImageEditor, [{
        key: '_init',
        value: function _init() {
            var _this2 = this;

            this._element.className = 'slim-image-editor';

            // wrapper
            this._wrapper = create('div', 'slim-wrapper');

            // photo crop mark container
            this._stage = create('div', 'slim-stage');
            this._wrapper.appendChild(this._stage);

            // create crop marks
            this._cropper = new CropArea();
            ImageCropperEvents.forEach(function (e) {
                _this2._cropper.element.addEventListener(e, _this2);
            });
            this._stage.appendChild(this._cropper.element);

            // canvas ghost
            this._previewWrapper = create('div', 'slim-image-editor-preview slim-crop-preview');
            this._previewBlurred = create('canvas', 'slim-crop-blur');
            this._previewWrapper.appendChild(this._previewBlurred);
            this._wrapper.appendChild(this._previewWrapper);

            this._preview = create('img', 'slim-crop');
            this._previewWrapper.appendChild(this._preview);

            // buttons
            this._btnGroup = create('div', 'slim-btn-group');
            ImageEditorButtons.forEach(function (c) {
                var prop = capitalizeFirstLetter(c);
                var label = _this2._options['button' + prop + 'Label'];
                var title = _this2._options['button' + prop + 'Title'];
                var className = _this2._options['button' + prop + 'ClassName'];
                var btn = create('button', 'slim-image-editor-btn slim-btn-' + c + (className ? ' ' + className : ''));
                btn.innerHTML = label;
                btn.title = title || label;
                btn.type = 'button';
                btn.setAttribute('data-action', c);
                btn.addEventListener('click', _this2);
                _this2._btnGroup.appendChild(btn);
            });

            this._element.appendChild(this._wrapper);
            this._element.appendChild(this._btnGroup);
        }
    }, {
        key: 'handleEvent',
        value: function handleEvent(e) {

            switch (e.type) {
                case 'click':
                    this._onClick(e);
                    break;
                case 'change':
                    this._onGridChange(e);
                    break;
                case 'input':
                    this._onGridInput(e);
                    break;
                case 'keydown':
                    this._onKeyDown(e);
                    break;
                case 'resize':
                    this._onResize(e);
                    break;
            }
        }
    }, {
        key: '_onKeyDown',
        value: function _onKeyDown(e) {

            switch (e.keyCode) {
                case Key.RETURN:
                    {
                        this._confirm();
                        break;
                    }
                case Key.ESC:
                    {
                        this._cancel();
                        break;
                    }
            }
        }
    }, {
        key: '_onClick',
        value: function _onClick(e) {

            if (e.target.classList.contains('slim-btn-cancel')) {
                this._cancel();
            }

            if (e.target.classList.contains('slim-btn-confirm')) {
                this._confirm();
            }
        }
    }, {
        key: '_onResize',
        value: function _onResize() {
            var _this3 = this;

            // remember window size
            this._currentWindowSize = {
                width: window.innerWidth,
                height: window.innerHeight
            };

            // now let's resize
            clearTimeout(this._resizeTimer);
            this._resizeTimer = setTimeout(function () {

                requestAnimationFrame(function () {

                    _this3._reflow();
                });
            }, 10);
        }
    }, {
        key: '_reflow',
        value: function _reflow() {

            // width before scale change
            var currentWidth = this._wrapper.offsetWidth;

            // let's redraw the image area
            this._redraw();

            // now let's rescale the cropper
            this._cropper.rescale(this._wrapper.offsetWidth / currentWidth);
        }
    }, {
        key: '_onGridInput',
        value: function _onGridInput() {

            this._maskOriginal();
        }
    }, {
        key: '_onGridChange',
        value: function _onGridChange() {

            this._maskOriginal();
        }
    }, {
        key: '_cancel',
        value: function _cancel() {

            this._element.dispatchEvent(new CustomEvent('cancel'));
        }
    }, {
        key: '_confirm',
        value: function _confirm() {

            this._element.dispatchEvent(new CustomEvent('confirm', {
                detail: {
                    crop: scaleRect(this._cropper.area, this._input.width / this._preview.width)
                }
            }));
        }
    }, {
        key: 'open',
        value: function open(image, ratio, crop, callback) {
            var _this4 = this;

            // store original width of input element for later use reference
            if (this._input && this._input.getAttribute('data-file') == image.getAttribute('data-file')) {
                callback();
                return;
            }

            // we'll always have to blur the preview of a newly opened image
            this._blurredPreview = false;

            // set as new input image
            this._input = image;
            this._preview.onload = function () {

                // redraw view (for first time)
                _this4._redraw();

                // wait till redrawn and then setup initial cropper
                requestAnimationFrame(function () {

                    var ratio = _this4.ratio;

                    _this4._cropper.minWidth = _this4._options.minSize.width * _this4.scalar;
                    _this4._cropper.minHeight = _this4._options.minSize.height * _this4.scalar;
                    _this4._cropper.ratio = ratio;

                    var rect = _this4._stage.getBoundingClientRect();
                    _this4._cropper.limit(rect.width, rect.height);
                    _this4._cropper.resize(crop.x * _this4.scalar, crop.y * _this4.scalar, crop.width * _this4.scalar, crop.height * _this4.scalar);

                    // done
                    callback();

                    // fade in
                    _this4._element.style.opacity = '';
                });
            };

            // preview
            var scalar = Math.min(this._element.offsetWidth / this._input.width, this._element.offsetHeight / this._input.height);
            this._preview.src = cloneCanvasScaled(this._input, scalar).toDataURL();

            // hide editor
            this._element.style.opacity = '0';

            // set ratio
            this._ratio = ratio;
        }
    }, {
        key: '_maskOriginal',
        value: function _maskOriginal() {
            var _this5 = this;

            // get cropper area
            var rect = this._cropper.area;

            // update on next frame (so it's in sync with crop area redraw)
            requestAnimationFrame(function () {

                // show only crop area of original image
                _this5._preview.style.clip = 'rect(' + rect.y + 'px,' + (rect.x + rect.width) + 'px,' + (rect.y + rect.height) + 'px,' + rect.x + 'px)';
            });
        }
    }, {
        key: '_reset',
        value: function _reset() {

            this._blurredPreview = false;

            // remove preview image
            this._preview.src = '';

            // clear canvas
            clearCanvas(this._previewBlurred);

            // reset grid
            this._cropper.reset();
        }
    }, {
        key: '_redraw',
        value: function _redraw() {

            // image ratio
            var ratio = this._input.height / this._input.width;

            // determine rounded size
            var buttonContainerHeight = this._btnGroup.offsetHeight;
            var maxWidth = this._element.clientWidth;
            var maxHeight = this._element.clientHeight - buttonContainerHeight;

            var width = maxWidth;
            var height = width * ratio;

            if (height > maxHeight) {
                height = maxHeight;
                width = height / ratio;
            }

            width = Math.round(width);
            height = Math.round(height);

            // rescale editor and blurred view
            this._previewBlurred.style.cssText = this._wrapper.style.cssText = '\n            width:' + width + 'px;\n            height:' + height + 'px;\n        ';

            // set image size based on container dimensions
            this._preview.width = width;
            this._preview.height = height;

            // scale and blur the blurry preview
            if (!this._blurredPreview) {

                this._previewBlurred.width = 300;
                this._previewBlurred.height = this._previewBlurred.width * ratio;

                copyCanvas(this._input, this._previewBlurred);

                blurCanvas(this._previewBlurred, 3);

                this._blurredPreview = true;
            }
        }
    }, {
        key: 'show',
        value: function show() {
            var callback = arguments.length <= 0 || arguments[0] === undefined ? function () {} : arguments[0];

            if (this._currentWindowSize.width !== window.innerWidth || this._currentWindowSize.height !== window.innerHeight) {
                this._reflow();
            }

            // listen to keydown so we can close or confirm with RETURN / ESC
            document.addEventListener('keydown', this);

            // when window is scaled we want to resize the editor
            window.addEventListener('resize', this);

            // fade in preview
            snabbt(this._previewWrapper, {
                fromPosition: [0, 0, 0],
                position: [0, 0, 0],
                fromOpacity: 0,
                opacity: .9999, // fixes IE render bug
                fromScale: [.98, .98],
                scale: [1, 1],
                easing: 'spring',
                springConstant: .3,
                springDeceleration: .85,
                delay: 450,
                complete: function complete() {
                    resetTransforms(this);
                }
            });

            if (this._cropper.dirty) {

                // now show slicer
                snabbt(this._stage, {
                    fromPosition: [0, 0, 0],
                    position: [0, 0, 0],
                    fromOpacity: 0,
                    opacity: 1,
                    duration: 250,
                    delay: 550,
                    complete: function complete() {
                        resetTransforms(this);
                        callback();
                    }
                });
            } else {

                // now show slicer
                snabbt(this._stage, {
                    fromPosition: [0, 0, 0],
                    position: [0, 0, 0],
                    fromOpacity: 0,
                    opacity: 1,
                    duration: 250,
                    delay: 1000,
                    complete: function complete() {
                        resetTransforms(this);
                    }
                });
            }

            // now show cancel
            snabbt(this._btnGroup.childNodes, {
                fromScale: [.9, .9],
                scale: [1, 1],
                fromOpacity: 0,
                opacity: 1,
                delay: function delay(i) {
                    return 1000 + i * 100;
                },
                easing: 'spring',
                springConstant: .3,
                springDeceleration: .85,
                complete: function complete() {
                    resetTransforms(this);
                }
            });
        }
    }, {
        key: 'hide',
        value: function hide() {
            var callback = arguments.length <= 0 || arguments[0] === undefined ? function () {} : arguments[0];

            // no more need to listen to keydown
            document.removeEventListener('keydown', this);

            // no more need to resize editor when window is scaled
            window.removeEventListener('resize', this);

            // fade out buttons
            snabbt(this._btnGroup.childNodes, {
                fromOpacity: 1,
                opacity: 0,
                duration: 350
            });

            snabbt([this._stage, this._previewWrapper], {
                fromPosition: [0, 0, 0],
                position: [0, -250, 0],
                fromOpacity: 1,
                opacity: 0,
                easing: 'spring',
                springConstant: .3,
                springDeceleration: .75,
                delay: 250,
                allDone: function allDone() {

                    callback();
                }
            });
        }
    }, {
        key: 'destroy',
        value: function destroy() {
            var _this6 = this;

            nodeListToArray(this._btnGroup.children).forEach(function (btn) {
                btn.removeEventListener('click', _this6);
            });

            ImageCropperEvents.forEach(function (e) {
                _this6._cropper.element.removeEventListener(e, _this6);
            });

            this._cropper.destroy();

            removeElement(this._element);
        }
    }, {
        key: 'element',
        get: function get() {
            return this._element;
        }
    }, {
        key: 'ratio',
        get: function get() {
            if (this._ratio === 'input') {
                return this._input.height / this._input.width;
            }
            return this._ratio;
        }
    }, {
        key: 'offset',
        get: function get() {
            return this._element.getBoundingClientRect();
        }
    }, {
        key: 'original',
        get: function get() {
            return this._input;
        }
    }, {
        key: 'scalar',
        get: function get() {
            return this._preview.width / this._input.width;
        }
    }], [{
        key: 'options',
        value: function options() {

            return {
                buttonCancelClassName: null,
                buttonConfirmClassName: null,
                buttonCancelLabel: 'Cancel',
                buttonConfirmLabel: 'Confirm',
                buttonCancelTitle: null,
                buttonConfirmTitle: null,
                minSize: {
                    width: 0,
                    height: 0
                }
            };
        }
    }]);

    return ImageEditor;
})();

var DragDropEvents = ['dragover', 'dragleave', 'drop'];

var FileHopper = (function () {
    function FileHopper() {
        var element = arguments.length <= 0 || arguments[0] === undefined ? document.createElement('div') : arguments[0];

        _classCallCheck(this, FileHopper);

        this._element = element;
        this._accept = [];

        this._dragPath = null;

        this._init();
    }

    /**
     * Popover
     */

    // public properties

    _createClass(FileHopper, [{
        key: 'areValidFiles',
        value: function areValidFiles(files) {

            if (this._accept.length && files) {
                return this._accept.indexOf(files[0].type) != -1;
            }
            return true;
        }

        // public methods
    }, {
        key: 'reset',
        value: function reset() {
            this._element.files = null;
        }

        // private
    }, {
        key: '_init',
        value: function _init() {
            var _this7 = this;

            this._element.className = 'slim-file-hopper';

            DragDropEvents.forEach(function (e) {
                _this7._element.addEventListener(e, _this7);
            });
        }

        // the input has changed
    }, {
        key: 'handleEvent',
        value: function handleEvent(e) {

            switch (e.type) {
                case 'dragover':
                    this._onDragOver(e);
                    break;
                case 'dragleave':
                    this._onDragLeave(e);
                    break;
                case 'drop':
                    this._onDrop(e);
                    break;
            }
        }
    }, {
        key: '_onDrop',
        value: function _onDrop(e) {

            // prevents browser from opening image
            e.preventDefault();

            // test type in older browsers
            if (!this.areValidFiles(e.dataTransfer.files)) {

                // invalid files, stop here
                this._element.dispatchEvent(new CustomEvent('file-invalid-drop'));

                // no longer hovering
                this._dragPath = null;
                return;
            }

            // store dropped files on element files property, so can be accessed by same function as file input handler
            this._element.files = e.dataTransfer.files;

            // file has been dropped
            this._element.dispatchEvent(new CustomEvent('file-drop', {
                detail: getOffsetByEvent(e)
            }));

            // file list has changed, let's notify others
            this._element.dispatchEvent(new CustomEvent('change'));

            // no longer hovering
            this._dragPath = null;
        }
    }, {
        key: '_onDragOver',
        value: function _onDragOver(e) {

            // prevents browser from opening image
            e.preventDefault();

            e.dataTransfer.dropEffect = 'copy';

            if (!this.areValidFiles(e.dataTransfer.items)) {

                // indicate drop mode to user
                e.dataTransfer.dropEffect = 'none';

                // invalid files, stop here
                this._element.dispatchEvent(new CustomEvent('file-invalid'));
                return;
            }

            // now hovering file over the area
            if (!this._dragPath) {
                this._dragPath = [];
            }

            // push location
            this._dragPath.push(getOffsetByEvent(e));

            // file is hovering over element
            this._element.dispatchEvent(new CustomEvent('file-over', {
                detail: {
                    x: last(this._dragPath).x,
                    y: last(this._dragPath).y
                }
            }));
        }
    }, {
        key: '_onDragLeave',
        value: function _onDragLeave(e) {

            // user has dragged file out of element area
            this._element.dispatchEvent(new CustomEvent('file-out', {
                detail: getOffsetByEvent(e)
            }));

            // now longer hovering file
            this._dragPath = null;
        }
    }, {
        key: 'destroy',
        value: function destroy() {
            var _this8 = this;

            DragDropEvents.forEach(function (e) {
                _this8._element.removeEventListener(e, _this8);
            });

            removeElement(this._element);
        }
    }, {
        key: 'element',
        get: function get() {
            return this._element;
        }
    }, {
        key: 'dragPath',
        get: function get() {
            return this._dragPath;
        }
    }, {
        key: 'enabled',
        get: function get() {
            return this._element.style.display === '';
        },
        set: function set(value) {
            this._element.style.display = value ? '' : 'none';
        }
    }, {
        key: 'accept',
        set: function set(mimetypes) {
            this._accept = mimetypes;
        },
        get: function get() {
            return this._accept;
        }
    }]);

    return FileHopper;
})();

var Popover = (function () {
    function Popover() {
        _classCallCheck(this, Popover);

        this._element = null;
        this._inner = null;

        this._init();
    }

    /**
     * Slim API
     */

    _createClass(Popover, [{
        key: '_init',
        value: function _init() {

            this._element = create('div', 'slim-popover');
            this._element.setAttribute('data-state', 'off');
            document.body.appendChild(this._element);
        }
    }, {
        key: 'show',
        value: function show() {
            var _this9 = this;

            var callback = arguments.length <= 0 || arguments[0] === undefined ? function () {} : arguments[0];

            // turn on
            this._element.setAttribute('data-state', 'on');

            // show and animate in
            snabbt(this._element, {
                fromOpacity: 0,
                opacity: 1,
                duration: 350,
                complete: function complete() {

                    // clean up transforms
                    resetTransforms(_this9._element);

                    // ready!
                    callback();
                }
            });
        }
    }, {
        key: 'hide',
        value: function hide() {
            var _this10 = this;

            var callback = arguments.length <= 0 || arguments[0] === undefined ? function () {} : arguments[0];

            // animate out and hide
            snabbt(this._element, {
                fromOpacity: 1,
                opacity: 0,
                duration: 500,
                complete: function complete() {

                    // clean up transforms
                    resetTransforms(_this10._element);

                    // hide the editor
                    _this10._element.setAttribute('data-state', 'off');

                    // ready!
                    callback();
                }
            });
        }
    }, {
        key: 'destroy',
        value: function destroy() {
            if (!this._element.parentNode) {
                return;
            }
            this._element.parentNode.removeChild(this._element);
        }
    }, {
        key: 'inner',
        set: function set(element) {

            this._inner = element;
            if (this._element.firstChild) {
                this._element.removeChild(this._element.firstChild);
            }
            this._element.appendChild(this._inner);
        }
    }]);

    return Popover;
})();

function intSplit(v, c) {
    return v.split(c).map(function (v) {
        return parseInt(v, 10);
    });
}

function isWrapper(element) {
    return element.nodeName == 'DIV';
}

var CropType = {
    AUTO: 'auto',
    INITIAL: 'initial',
    MANUAL: 'manual'
};

var Rect = ['x', 'y', 'width', 'height'];

var HopperEvents = ['file-invalid-drop', 'file-invalid', 'file-drop', 'file-over', 'file-out', 'click'];

var ImageEditorEvents = ['cancel', 'confirm'];

var SlimPopover = null;
var SlimCount = 0;

var SlimButtons = ['remove', 'edit', 'download', 'upload'];

var SlimType = {
    IMG: 'img',
    INPUT: 'input'
};

var SlimLoaderHTML = '\n<div class="slim-loader">\n    <svg>\n        <path class="slim-loader-background" fill="none" stroke-width="3" />\n        <path class="slim-loader-foreground" fill="none" stroke-width="3" />\n    </svg>\n</div>\n';

var SlimUploadStatusHTML = '\n<div class="slim-upload-status"></div>\n';

var Slim = (function () {
    function Slim(element) {
        var options = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];

        _classCallCheck(this, Slim);

        // create popover element if not already created
        if (!SlimPopover) {
            SlimPopover = new Popover();
        }

        // we create a new counter, we use this counter to determine if we need to clean up the popover
        SlimCount++;

        // the options to use
        this._options = mergeOptions(Slim.options(), options);

        // reference to original element so we can restore original situation
        this._originalElement = element;
        this._originalElementInner = element.innerHTML;
        this._originalElementAttributes = getElementAttributes(element);

        // should be file input, image or slim wrapper, if not wrapper, wrap
        if (!isWrapper(element)) {

            this._element = wrap(element);
            this._element.className = element.className;
            element.className = '';

            // ratio is used for CSS so let's set default attribute
            this._element.setAttribute('data-ratio', this._options.ratio);
        } else {
            this._element = element;
        }
        this._element.classList.add('slim');
        this._element.setAttribute('data-state', 'init');

        // the source element (can either be an input or an img)
        this._input = null;

        // the output element (hidden input that contains the resulting json object)
        this._output = null;

        // current image ratio
        this._ratio = null;

        // was required field
        this._isRequired = false;

        // components
        this._imageHopper = null;
        this._imageEditor = null;

        // progress path
        this._progressEnabled = true;

        // resulting data
        this._data = {};
        this._resetData();

        // editor state
        this._state = [];

        // the circle below the mouse hover point
        this._drip = null;

        // had initial image
        this._hasInitialImage = false;

        // initial crop
        this._initialCrop = this._options.crop;

        // set to true when destroy method is called, used to halt any timeouts or async processes
        this._isBeingDestroyed = false;

        // let's go!
        if (Slim.supported) {
            this._init();
        } else {
            this._fallback();
        }
    }

    /**
     * Slim Static Methods
     */

    _createClass(Slim, [{
        key: 'isAttachedTo',

        // methods
        // Test if this Slim object has been bound to the given element
        value: function isAttachedTo(element) {
            return this._element === element || this._originalElement === element;
        }
    }, {
        key: 'isDetached',
        value: function isDetached() {
            return this._element.parentNode === null;
        }
    }, {
        key: 'load',
        value: function load(src, options, callback) {
            if (options === undefined) options = {};

            if (typeof options == 'function') {
                callback = options;
            } else {

                // store in options
                this._options.crop = options.crop;

                // set initial crop
                this._initialCrop = this._options.crop;
            }

            this._load(src, callback);
        }
    }, {
        key: 'upload',
        value: function upload(callback) {
            this._doUpload(callback);
        }
    }, {
        key: 'download',
        value: function download() {
            this._doDownload();
        }
    }, {
        key: 'remove',
        value: function remove() {
            return this._doRemove();
        }
    }, {
        key: 'destroy',
        value: function destroy() {
            this._doDestroy();
        }

        /**
         * State Related
         */
    }, {
        key: '_getFileInput',
        value: function _getFileInput() {
            return this._element.querySelector('input[type=file]');
        }
    }, {
        key: '_getInitialImage',
        value: function _getInitialImage() {
            return this._element.querySelector('img');
        }
    }, {
        key: '_getInputElement',
        value: function _getInputElement() {
            return this._getFileInput() || this._getInitialImage();
        }
    }, {
        key: '_getRatioSpacerElement',
        value: function _getRatioSpacerElement() {
            return this._element.children[0];
        }
    }, {
        key: '_isImageOnly',
        value: function _isImageOnly() {
            return this._input.nodeName !== 'INPUT';
        }
    }, {
        key: '_isFixedRatio',
        value: function _isFixedRatio() {
            return this._options.ratio.indexOf(':') !== -1;
        }
    }, {
        key: '_toggleButton',
        value: function _toggleButton(action, state) {
            toggleDisplayBySelector('.slim-btn[data-action="' + action + '"]', state, this._element);
        }
    }, {
        key: '_clearState',
        value: function _clearState() {
            this._state = [];
            this._updateState();
        }
    }, {
        key: '_removeState',
        value: function _removeState(state) {
            this._state = this._state.filter(function (item) {
                return item !== state;
            });
            this._updateState();
        }
    }, {
        key: '_addState',
        value: function _addState(state) {
            if (inArray(state, this._state)) {
                return;
            }
            this._state.push(state);
            this._updateState();
        }
    }, {
        key: '_updateState',
        value: function _updateState() {
            this._element.setAttribute('data-state', this._state.join(','));
        }
    }, {
        key: '_resetData',
        value: function _resetData() {

            // resets data object
            this._data = {
                server: null,
                meta: null,
                input: {
                    image: null,
                    name: null,
                    type: null,
                    width: 0,
                    height: 0
                },
                output: {
                    image: null,
                    width: 0,
                    height: 0
                },
                actions: {
                    crop: null,
                    size: null
                }
            };

            // resets hidden input clone
            if (this._output) {
                this._output.value = '';
            }

            // should reset file input
            resetFileInput(this._getFileInput());
        }

        /**
         * Initialisation
         */
    }, {
        key: '_init',
        value: function _init() {
            var _this11 = this;

            // cropper root is not file input
            this._addState('empty');

            // get input element
            this._input = this._getInputElement();

            // if no input supplied we'll automatically create one
            if (!this._input) {
                this._input = create('input');
                this._input.type = 'file';
                this._element.appendChild(this._input);
            }

            // get required state of input element
            this._isRequired = this._input.required === true;

            // set or create output field
            this._output = this._element.querySelector('input[type=hidden]');

            // if no output element defined we'll create one automagically
            if (!this._output) {
                this._output = create('input');
                this._output.type = 'hidden';
                this._output.name = this._input.name || this._options.defaultInputName;
                this._element.appendChild(this._output);
            }

            // prevent the original file input field from posting (value will be duplicated to output field)
            this._input.removeAttribute('name');

            // create drop area
            var area = create('div', 'slim-area');

            // test if contains initial image
            var initialImage = this._getInitialImage();
            var initialImageSrc = (initialImage || {}).src;
            if (initialImageSrc) {
                this._hasInitialImage = true;
            } else {
                this._initialCrop = null;
            }

            var resultHTML = '\n        <div class="slim-result">\n            <img class="in" style="opacity:0" ' + (initialImageSrc ? 'src="' + initialImageSrc + '"' : '') + '><img><img style="opacity:0">\n        </div>';

            // add drop overlay
            if (this._isImageOnly()) {
                area.innerHTML = '\n                ' + SlimLoaderHTML + '\n                ' + SlimUploadStatusHTML + '\n                ' + resultHTML + '\n            ';
            } else {

                // set common image mime type to the accept attribute
                var _mimetypes = undefined;
                if (!this._input.hasAttribute('accept')) {
                    _mimetypes = getCommonMimeTypes();
                    this._input.setAttribute('accept', _mimetypes.join(','));
                } else {
                    _mimetypes = this._input.accept.split(',').filter(function (mimetype) {
                        return mimetype.length > 0;
                    });
                }

                // setup hopper
                this._imageHopper = new FileHopper();
                this._imageHopper.accept = _mimetypes;
                this._element.appendChild(this._imageHopper.element);
                HopperEvents.forEach(function (e) {
                    _this11._imageHopper.element.addEventListener(e, _this11);
                });

                // render area
                area.innerHTML = '\n                ' + SlimLoaderHTML + '\n                ' + SlimUploadStatusHTML + '\n                <div class="slim-drip"><span><span></span></span></div>\n                <div class="slim-status"><div class="slim-label">' + (this._options.label || '') + '</div></div>\n                ' + resultHTML + '\n            ';

                // start listening for events so we can load image on file input change
                this._input.addEventListener('change', this);
            }

            // add area node
            this._element.appendChild(area);

            // add button group
            this._btnGroup = create('div', 'slim-btn-group');
            this._btnGroup.style.display = 'none';
            this._element.appendChild(this._btnGroup);
            SlimButtons.filter(function (c) {
                return _this11._isButtonAllowed(c);
            }).forEach(function (c) {
                var prop = capitalizeFirstLetter(c);
                var label = _this11._options['button' + prop + 'Label'];
                var title = _this11._options['button' + prop + 'Title'] || label;
                var className = _this11._options['button' + prop + 'ClassName'];
                var btn = create('button', 'slim-btn slim-btn-' + c + (className ? ' ' + className : ''));
                btn.innerHTML = label;
                btn.title = title;
                btn.type = 'button';
                btn.addEventListener('click', _this11);
                btn.setAttribute('data-action', c);
                _this11._btnGroup.appendChild(btn);
            });

            // add ratio padding
            if (this._isFixedRatio()) {
                var parts = intSplit(this._options.ratio, ':');
                this._ratio = parts[1] / parts[0];
                this._scaleDropArea(this._ratio);
            }

            // setup loader
            this._updateProgress(.5);

            // preload source
            if (initialImageSrc) {

                this._load(initialImageSrc, function () {

                    // done loading initial image
                    _this11._onInit();
                });
            } else {
                this._onInit();
            }
        }
    }, {
        key: '_onInit',
        value: function _onInit() {
            var _this12 = this;

            // done inintialising now, else is only called after image load
            // we call this async so the constructor of Slim has returned before the onInit is called, allowing clean immidiate destroy
            setTimeout(function () {
                _this12._options.onInit(_this12);
            }, 0);
        }
    }, {
        key: '_updateProgress',
        value: function _updateProgress(progress) {

            if (!this._progressEnabled) {
                return;
            }

            var loader = this._element.querySelector('.slim-loader');
            if (!loader) {
                return;
            }
            var rect = loader.getBoundingClientRect();
            var paths = loader.querySelectorAll('path');
            var ringWidth = parseInt(paths[0].getAttribute('stroke-width'), 10);

            paths[0].setAttribute('d', percentageArc(rect.width * .5, rect.height * .5, rect.width * .5 - ringWidth, .9999));

            paths[1].setAttribute('d', percentageArc(rect.width * .5, rect.height * .5, rect.width * .5 - ringWidth, progress));
        }
    }, {
        key: '_startProgress',
        value: function _startProgress() {
            var _this13 = this;

            this._progressEnabled = false;

            var loader = this._element.querySelector('.slim-loader');
            if (!loader) {
                return;
            }
            var ring = loader.children[0];

            this._stopProgressLoop(function () {

                loader.removeAttribute('style');
                ring.removeAttribute('style');

                _this13._progressEnabled = true;

                _this13._updateProgress(0);

                _this13._progressEnabled = false;

                snabbt(ring, {

                    fromOpacity: 0,
                    opacity: 1,
                    duration: 250,
                    complete: function complete() {
                        _this13._progressEnabled = true;
                    }
                });
            });
        }
    }, {
        key: '_stopProgress',
        value: function _stopProgress() {
            var _this14 = this;

            var loader = this._element.querySelector('.slim-loader');
            if (!loader) {
                return;
            }
            var ring = loader.children[0];

            this._updateProgress(1);

            snabbt(ring, {
                fromOpacity: 1,
                opacity: 0,
                duration: 250,
                complete: function complete() {

                    loader.removeAttribute('style');
                    ring.removeAttribute('style');

                    _this14._updateProgress(.5);

                    _this14._progressEnabled = false;
                }
            });
        }
    }, {
        key: '_startProgressLoop',
        value: function _startProgressLoop() {

            // start loading animation
            var loader = this._element.querySelector('.slim-loader');
            if (!loader) {
                return;
            }
            var ring = loader.children[0];
            loader.removeAttribute('style');
            ring.removeAttribute('style');

            // set infinite load state
            this._updateProgress(.5);

            // repeat!
            var repeat = 1000;

            snabbt(loader, {
                rotation: [0, 0, -(Math.PI * 2) * repeat],
                easing: 'linear',
                duration: repeat * 1000
            });

            snabbt(ring, {
                fromOpacity: 0,
                opacity: 1,
                duration: 250
            });
        }
    }, {
        key: '_stopProgressLoop',
        value: function _stopProgressLoop(callback) {

            var loader = this._element.querySelector('.slim-loader');
            if (!loader) {
                return;
            }
            var ring = loader.children[0];

            snabbt(ring, {
                fromOpacity: parseFloat(ring.style.opacity),
                opacity: 0,
                duration: 250,
                complete: function complete() {
                    snabbt(loader, 'stop');
                    if (callback) {
                        callback();
                    }
                }
            });
        }
    }, {
        key: '_isButtonAllowed',
        value: function _isButtonAllowed(button) {

            if (button === 'edit') {
                return this._options.edit;
            }

            if (button === 'download') {
                return this._options.download;
            }

            if (button === 'upload') {

                // if no service defined upload button makes no sense
                if (!this._options.service) {
                    return false;
                }

                // if push mode is set, no need for upload button
                if (this._options.push) {
                    return false;
                }

                // set upload button
                return true;
            }

            if (button === 'remove') {
                return !this._isImageOnly();
            }

            return true;
        }
    }, {
        key: '_fallback',
        value: function _fallback() {

            this._removeState('init');

            // create status area
            var area = create('div', 'slim-area');
            area.innerHTML = '\n            <div class="slim-status"><div class="slim-label">' + (this._options.label || '') + '</div></div>\n        ';
            this._element.appendChild(area);

            this._throwError(this._options.statusNoSupport);
        }

        /**
         * Event routing
         */
    }, {
        key: 'handleEvent',
        value: function handleEvent(e) {

            switch (e.type) {
                case 'click':
                    this._onClick(e);
                    break;
                case 'change':
                    this._onChange(e);
                    break;
                case 'cancel':
                    this._onCancel(e);
                    break;
                case 'confirm':
                    this._onConfirm(e);
                    break;
                case 'file-over':
                    this._onFileOver(e);
                    break;
                case 'file-out':
                    this._onFileOut(e);
                    break;
                case 'file-drop':
                    this._onDropFile(e);
                    break;
                case 'file-invalid':
                    this._onInvalidFile(e);
                    break;
                case 'file-invalid-drop':
                    this._onInvalidFileDrop(e);
                    break;
            }
        }
    }, {
        key: '_getIntro',
        value: function _getIntro() {
            return this._element.querySelector('.slim-result .in');
        }
    }, {
        key: '_getOutro',
        value: function _getOutro() {
            return this._element.querySelector('.slim-result .out');
        }
    }, {
        key: '_getInOut',
        value: function _getInOut() {
            return this._element.querySelectorAll('.slim-result img');
        }
    }, {
        key: '_getDrip',
        value: function _getDrip() {
            if (!this._drip) {
                this._drip = this._element.querySelector('.slim-drip > span');
            }
            return this._drip;
        }

        // errors
    }, {
        key: '_throwError',
        value: function _throwError(error) {

            this._addState('error');

            this._element.querySelector('.slim-label').style.display = 'none';

            var node = this._element.querySelector('.slim-error');
            if (!node) {
                node = create('div', 'slim-error');
                this._element.querySelector('.slim-status').appendChild(node);
            }

            node.innerHTML = error;
        }
    }, {
        key: '_removeError',
        value: function _removeError() {

            this._removeState('error');
            this._element.querySelector('.slim-label').style.display = '';

            var error = this._element.querySelector('.slim-error');
            if (error) {
                error.parentNode.removeChild(error);
            }
        }
    }, {
        key: '_openFileDialog',
        value: function _openFileDialog() {
            this._input.click();
        }

        // drop area clicked
    }, {
        key: '_onClick',
        value: function _onClick(e) {
            var _this15 = this;

            var list = e.target.classList;
            var target = e.target;

            // no preview, so possible to drop file
            if (list.contains('slim-file-hopper')) {
                this._openFileDialog();
                return;
            }

            // decide what button was clicked
            switch (target.getAttribute('data-action')) {
                case 'remove':
                    this._options.onBeforeRemove(this, function () {
                        _this15._doRemove();
                    });
                    break;
                case 'edit':
                    this._doEdit();
                    break;
                case 'download':
                    this._doDownload();
                    break;
                case 'upload':
                    this._doUpload();
                    break;
            }
        }
    }, {
        key: '_onInvalidFileDrop',
        value: function _onInvalidFileDrop() {

            this._onInvalidFile();

            this._removeState('file-over');

            // animate out drip
            var drip = this._getDrip();
            snabbt(drip.firstChild, {
                fromScale: [.5, .5],
                scale: [0, 0],
                fromOpacity: .5,
                opacity: 0,
                duration: 150,
                complete: function complete() {

                    // clean up transforms
                    resetTransforms(drip.firstChild);
                }
            });
        }
    }, {
        key: '_onInvalidFile',
        value: function _onInvalidFile() {

            var types = this._imageHopper.accept.map(getExtensionByMimeType);
            var error = this._options.statusFileType.replace('$0', types.join(', '));
            this._throwError(error);
        }
    }, {
        key: '_onOverWeightFile',
        value: function _onOverWeightFile() {

            var error = this._options.statusFileSize.replace('$0', this._options.maxFileSize);
            this._throwError(error);
        }
    }, {
        key: '_onFileOver',
        value: function _onFileOver(e) {

            this._addState('file-over');
            this._removeError();

            // animations
            var drip = this._getDrip();

            // move around drip
            var matrix = snabbt.createMatrix();
            matrix.translate(e.detail.x, e.detail.y, 0);
            snabbt.setElementTransform(drip, matrix);

            // on first entry fade in blob
            if (this._imageHopper.dragPath.length == 1) {

                // show
                drip.style.opacity = 1;

                // animate in
                snabbt(drip.firstChild, {
                    fromOpacity: 0,
                    opacity: .5,
                    fromScale: [0, 0],
                    scale: [.5, .5],
                    duration: 150
                });
            }
        }
    }, {
        key: '_onFileOut',
        value: function _onFileOut(e) {

            this._removeState('file-over');
            this._removeState('file-invalid');
            this._removeError();

            // move to last position
            var drip = this._getDrip();
            var matrix = snabbt.createMatrix();
            matrix.translate(e.detail.x, e.detail.y, 0);
            snabbt.setElementTransform(drip, matrix);

            // animate out
            snabbt(drip.firstChild, {
                fromScale: [.5, .5],
                scale: [0, 0],
                fromOpacity: .5,
                opacity: 0,
                duration: 150,
                complete: function complete() {

                    // clean up transforms
                    resetTransforms(drip.firstChild);
                }
            });
        }

        /**
         * When a file was literally dropped on the drop area
         * @param e
         * @private
         */
    }, {
        key: '_onDropFile',
        value: function _onDropFile(e) {
            var _this16 = this;

            this._removeState('file-over');

            // get drip node reference and set to last position
            var drip = this._getDrip();
            var matrix = snabbt.createMatrix();
            matrix.translate(e.detail.x, e.detail.y, 0);
            snabbt.setElementTransform(drip, matrix);

            // get element minimum 10 entries distant from the last entry so we can calculate velocity of movement
            var l = this._imageHopper.dragPath.length;
            var jump = this._imageHopper.dragPath[l - Math.min(10, l)];

            // velocity
            var dx = e.detail.x - jump.x;
            var dy = e.detail.y - jump.y;

            snabbt(drip, {
                fromPosition: [e.detail.x, e.detail.y, 0],
                position: [e.detail.x + dx, e.detail.y + dy, 0],
                duration: 200
            });

            // animate out drip
            snabbt(drip.firstChild, {

                fromScale: [.5, .5],
                scale: [2, 2],
                fromOpacity: 1,
                opacity: 0,
                duration: 200,

                complete: function complete() {

                    // clean up transforms
                    resetTransforms(drip.firstChild);

                    // load dropped resource
                    _this16._load(e.target.files[0]);
                }
            });
        }

        /**
         * When a file has been selected after a click on the drop area
         * @param e
         * @private
         */
    }, {
        key: '_onChange',
        value: function _onChange(e) {

            this._load(e.target.files[0]);
        }

        /**
         * Loads a resource (blocking operation)
         * @param resource
         * @param callback(err)
         * @private
         */
    }, {
        key: '_load',
        value: function _load(resource, callback) {
            var _this17 = this;

            // stop here
            if (this._isBeingDestroyed) {
                return;
            }

            // meta data
            var file = getFileMetaData(resource);

            // test if too big
            if (file.size && this._options.maxFileSize && bytesToMegaBytes(file.size) > this._options.maxFileSize) {
                this._onOverWeightFile();
                if (callback) {
                    callback('file-too-big');
                }
                return;
            }

            // no longer empty
            this._removeState('empty');

            // can't drop any other image
            if (this._imageHopper) {
                this._imageHopper.enabled = false;
            }

            // continue
            this._data.input.name = file.name;
            this._data.input.type = file.type;
            this._data.input.size = file.size;

            // start loading indicator
            this._startProgressLoop();
            this._addState('busy');

            // fetch resource
            getImageAsCanvas(resource, function (image, meta) {

                // if no image, something went wrong
                if (!image) {

                    _this17._removeState('busy');
                    _this17._stopProgressLoop();

                    _this17._resetData();

                    if (callback) {
                        callback('file-not-found');
                    }

                    return;
                }

                // store file name, used to compare canvas data later on
                image.setAttribute('data-file', file.name);

                // load the image
                _this17._loadCanvas(image, function () {

                    var intro = _this17._getIntro();

                    // setup base animation
                    var animation = {
                        fromScale: [1.25, 1.25],
                        scale: [1, 1],
                        fromOpacity: 0,
                        opacity: 1,
                        complete: function complete() {

                            resetTransforms(intro);

                            intro.style.opacity = 1;

                            _this17._showButtons();

                            _this17._stopProgressLoop();
                            _this17._removeState('busy');
                            _this17._addState('preview');

                            if (callback) {
                                callback(null, _this17.data);
                            }
                        }

                    };

                    // if not attached to DOM, don't animate
                    if (_this17.isDetached()) {
                        animation.duration = 1;
                    } else {
                        animation.easing = 'spring';
                        animation.springConstant = .3;
                        animation.springDeceleration = .7;
                    }

                    // reveal loaded image
                    snabbt(intro, animation);
                });
            });
        }
    }, {
        key: '_loadCanvas',
        value: function _loadCanvas(image, ready) {
            var _this18 = this;

            // halt here if cropper is currently being destroyed
            if (this._isBeingDestroyed) {
                return;
            }

            // scales the drop area
            // if is 'input' or 'free' parameter
            if (!this._isFixedRatio()) {
                this._ratio = image.height / image.width;
                this._scaleDropArea(this._ratio);
            }

            // store raw data
            this._data.input.image = image;
            this._data.input.width = image.width;
            this._data.input.height = image.height;

            if (this._initialCrop) {

                // use initial supplied crop rectangle
                this._data.actions.crop = clone(this._initialCrop);
                this._data.actions.crop.type = CropType.INITIAL;

                // clear initial crop, it's no longer useful
                this._initialCrop = null;
            } else {
                // get automagical crop rectangle
                this._data.actions.crop = getAutoCropRect(image.width, image.height, this._ratio);
                this._data.actions.crop.type = CropType.AUTO;
            }

            // if max size set
            if (this._options.size) {
                this._data.actions.size = {
                    width: this._options.size.width,
                    height: this._options.size.height
                };
            }

            // do initial auto transform
            this._applyTransforms(image, function (transformedImage) {

                var intro = _this18._getIntro();
                var scalar = intro.offsetWidth / transformedImage.width;

                // store data, if has preview image this prevents initial load from pushing
                var doUpload = false;

                // can only do auto upload when service is defined and push is enabled...
                if (_this18._options.service && _this18._options.push) {

                    // ...and is not transformation of initial image
                    if (!_this18._hasInitialImage) {
                        doUpload = true;
                    }
                }

                _this18._save(function () {}, doUpload);

                // show intro animation
                intro.src = cloneCanvasScaled(transformedImage, scalar).toDataURL();
                intro.onload = function () {

                    intro.onload = null;

                    // bail out if we've been cleaned up
                    if (_this18._isBeingDestroyed) {
                        return;
                    }

                    if (ready) {
                        ready();
                    }
                };
            });
        }
    }, {
        key: '_applyTransforms',
        value: function _applyTransforms(image, ready) {
            var _this19 = this;

            transformCanvas(image, this._data.actions, function (transformedImage) {

                _this19._data.output.width = transformedImage.width;
                _this19._data.output.height = transformedImage.height;
                _this19._data.output.image = transformedImage;

                _this19._onTransformCanvas(_this19._data, function (transformedData) {

                    _this19._data = transformedData;

                    ready(_this19._data.output.image);
                });
            });
        }
    }, {
        key: '_onTransformCanvas',
        value: function _onTransformCanvas(data, ready) {

            this._options.onTransform(cloneData(data), ready);
        }

        /**
         * Creates the editor nodes
         * @private
         */
    }, {
        key: '_appendEditor',
        value: function _appendEditor() {
            var _this20 = this;

            // we already have an editor
            if (this._imageEditor) {
                return;
            }

            // add editor
            this._imageEditor = new ImageEditor(create('div'), {
                minSize: this._options.minSize,

                buttonConfirmClassName: 'slim-btn-confirm',
                buttonCancelClassName: 'slim-btn-cancel',

                buttonConfirmLabel: this._options.buttonConfirmLabel,
                buttonCancelLabel: this._options.buttonCancelLabel,

                buttonConfirmTitle: this._options.buttonConfirmTitle,
                buttonCancelTitle: this._options.buttonCancelTitle

            });

            // listen to events
            ImageEditorEvents.forEach(function (e) {
                _this20._imageEditor.element.addEventListener(e, _this20);
            });
        }
    }, {
        key: '_scaleDropArea',
        value: function _scaleDropArea(ratio) {
            var node = this._getRatioSpacerElement();
            node.style.marginBottom = ratio * 100 + '%';
            this._element.setAttribute('data-ratio', '1:' + ratio);
        }

        /**
         * Data Layer
         * @private
         */
        // image editor closed
    }, {
        key: '_onCancel',
        value: function _onCancel(e) {

            this._removeState('editor');

            this._showButtons();

            this._hideEditor();
        }

        // user confirmed changes
    }, {
        key: '_onConfirm',
        value: function _onConfirm(e) {
            var _this21 = this;

            this._removeState('editor');

            this._startProgressLoop();
            this._addState('busy');

            // clear data
            this._output.value = '';

            // apply new action object to this._data
            this._data.actions.crop = e.detail.crop;
            this._data.actions.crop.type = CropType.MANUAL;

            // do transforms
            this._applyTransforms(this._data.input.image, function (transformedImage) {

                // set new image result
                var images = _this21._getInOut();
                var intro = images[0].className === 'out' ? images[0] : images[1];
                var outro = intro === images[0] ? images[1] : images[0];

                intro.className = 'in';
                intro.style.opacity = '0';
                intro.style.zIndex = '2';
                outro.className = 'out';
                outro.style.zIndex = '1';

                // new image get's
                intro.src = cloneCanvasScaled(transformedImage, intro.offsetWidth / transformedImage.width).toDataURL();
                intro.onload = function () {

                    intro.onload = null;

                    // scale the dropzone
                    if (_this21._options.ratio === 'free') {
                        _this21._ratio = intro.naturalHeight / intro.naturalWidth;
                        _this21._scaleDropArea(_this21._ratio);
                    }

                    // close the editor
                    _this21._hideEditor();

                    // wait a tiny bit so animations sync up nicely
                    setTimeout(function () {

                        // show the preview
                        _this21._showPreview(intro, function () {

                            // if
                            // - service set
                            // - and we are pushing
                            // we will upload
                            var willUpload = _this21._options.service && _this21._options.push;

                            // save the data
                            _this21._save(function (err, res) {

                                // done!
                                _this21._toggleButton('upload', true);

                                _this21._stopProgressLoop();
                                _this21._removeState('busy');

                                _this21._showButtons();

                                // if server returns a path, use server path for new image
                                if (!res || !res.path) {
                                    return;
                                }
                                intro.src = res.path;
                            }, willUpload);
                        });
                    }, 250);
                };
            });
        }
    }, {
        key: '_save',
        value: function _save() {
            var _this22 = this;

            var callback = arguments.length <= 0 || arguments[0] === undefined ? function () {} : arguments[0];
            var allowUpload = arguments.length <= 1 || arguments[1] === undefined ? true : arguments[1];

            // flatten data also turns canvas into data uri's
            var data = flattenData(this._data, this._options.post);

            // decide if we need to
            // - A. Upload the data
            // - B. Store the data in an output field

            // user has final option to alter data
            this._options.onSave(data, function (data) {

                // if output field defined and no service store for sync submit
                if (_this22._output && !_this22._options.service) {
                    _this22._store(data);
                }

                // is remote service defined up async
                if (_this22._options.service && allowUpload) {
                    _this22._upload(data, function (err, res) {

                        // store response
                        if (!err) {
                            _this22._storeServerResponse(res);
                        }

                        // upload returned
                        _this22._options.onComplete(err, res);

                        // woo
                        callback(err, res);
                    });
                }

                // if no service, we're done here
                if (!_this22._options.service || !allowUpload) {
                    callback();
                }
            });
        }

        // stores active file information in hidden output field
    }, {
        key: '_storeServerResponse',
        value: function _storeServerResponse(data) {

            // remove required flag
            if (this._isRequired) {
                this._input.required = false;
            }

            // store data returned from server
            this._data.server = data;

            // sync with output value
            this._output.value = typeof data === 'object' ? JSON.stringify(this._data.server) : data;
        }

        // stores data in output field
    }, {
        key: '_store',
        value: function _store(data) {

            if (this._isRequired) {
                this._input.required = false;
            }

            this._output.value = JSON.stringify(data);
        }

        // uploads given data to server
    }, {
        key: '_upload',
        value: function _upload(data, callback) {
            var _this23 = this;

            var fd = new FormData();
            fd.append(this._output.name, JSON.stringify(data));

            var statusNode = this._element.querySelector('.slim-upload-status');

            send(this._options.service,

            // data
            fd,

            // progress
            function (loaded, total) {

                _this23._updateProgress(loaded / total);
            },

            // success
            function (obj) {

                setTimeout(function () {

                    statusNode.innerHTML = _this23._options.statusUploadSuccess;
                    statusNode.setAttribute('data-state', 'success');
                    statusNode.style.opacity = 1;

                    // hide status update after 2 seconds
                    setTimeout(function () {
                        statusNode.style.opacity = 0;
                    }, 2000);
                }, 250);

                callback(null, obj);
            },

            // error
            function (status) {

                var html = '';
                if (status === 'file-too-big') {
                    html = _this23._options.statusContentLength;
                } else {
                    html = _this23._options.statusUnknownResponse;
                }

                // when an error occurs the status update is not automatically hidden
                setTimeout(function () {

                    statusNode.innerHTML = html;
                    statusNode.setAttribute('data-state', 'error');
                    statusNode.style.opacity = 1;
                }, 250);

                callback(status);
            });
        }
    }, {
        key: '_showEditor',
        value: function _showEditor() {

            SlimPopover.show();

            this._imageEditor.show();
        }
    }, {
        key: '_hideEditor',
        value: function _hideEditor() {

            this._imageEditor.hide();

            setTimeout(function () {

                SlimPopover.hide();
            }, 250);
        }

        /**
         * Animations
         */
    }, {
        key: '_showPreview',
        value: function _showPreview(intro, callback) {

            snabbt(intro, {

                fromPosition: [0, 50, 0],
                position: [0, 0, 0],

                fromScale: [1.5, 1.5],
                scale: [1, 1],

                fromOpacity: 0,
                opacity: 1,

                easing: 'spring',
                springConstant: .3,
                springDeceleration: .7,

                complete: function complete() {

                    resetTransforms(intro);

                    if (callback) {
                        callback();
                    }
                }

            });
        }
    }, {
        key: '_hideResult',
        value: function _hideResult(callback) {

            var intro = this._getIntro();
            if (!intro) {
                return;
            }

            snabbt(intro, {

                fromScale: [1, 1],
                scale: [.5, .5],

                fromOpacity: 1,
                opacity: 0,

                easing: 'spring',
                springConstant: .3,
                springDeceleration: .75,

                complete: function complete() {
                    resetTransforms(intro);

                    if (callback) {
                        callback();
                    }
                }

            });
        }
    }, {
        key: '_showButtons',
        value: function _showButtons(callback) {

            this._btnGroup.style.display = '';

            // setup animation
            var animation = {
                fromScale: [.5, .5],
                scale: [1, 1],
                fromPosition: [0, 10, 0],
                position: [0, 0, 0],
                fromOpacity: 0,
                opacity: 1,
                complete: function complete() {
                    resetTransforms(this);
                },
                allDone: function allDone() {
                    if (callback) {
                        callback();
                    }
                }
            };

            // don't animate when detached
            if (this.isDetached()) {
                animation.duration = 1;
            } else {
                animation.delay = function (i) {
                    return 250 + i * 50;
                };
                animation.easing = 'spring';
                animation.springConstant = .3;
                animation.springDeceleration = .85;
            }

            snabbt(this._btnGroup.childNodes, animation);
        }
    }, {
        key: '_hideButtons',
        value: function _hideButtons(callback) {
            var _this24 = this;

            var animation = {
                fromScale: [1, 1],
                scale: [.85, .85],
                fromOpacity: 1,
                opacity: 0,
                allDone: function allDone() {
                    _this24._btnGroup.style.display = 'none';
                    if (callback) {
                        callback();
                    }
                }
            };

            // don't animate when detached
            if (this.isDetached()) {
                animation.duration = 1;
            } else {
                animation.easing = 'spring';
                animation.springConstant = .3;
                animation.springDeceleration = .75;
            }

            // go hide the buttons
            snabbt(this._btnGroup.childNodes, animation);
        }
    }, {
        key: '_hideStatus',
        value: function _hideStatus() {

            var statusNode = this._element.querySelector('.slim-upload-status');
            statusNode.style.opacity = 0;
        }
    }, {
        key: '_doEdit',
        value: function _doEdit() {
            var _this25 = this;

            // if no input data available, can't edit anything
            if (!this._data.input.image) {
                return;
            }

            // now in editor mode
            this._addState('editor');

            // create editor (if not already created)
            if (!this._imageEditor) {
                this._appendEditor();
            }

            // append to popover
            SlimPopover.inner = this._imageEditor.element;

            // read the data
            this._imageEditor.open(

            // send copy of canvas to the editor
            cloneCanvas(this._data.input.image),

            // determine ratio
            this._options.ratio === 'free' ? null : this._ratio,

            // the initial crop to show
            this._data.actions.crop,

            // handle editor load
            function () {

                _this25._showEditor();

                _this25._hideButtons();

                _this25._hideStatus();
            });
        }
    }, {
        key: '_doRemove',
        value: function _doRemove() {
            var _this26 = this;

            // cannot remove when is only one image
            if (this._isImageOnly()) {
                return;
            }

            this._clearState();
            this._addState('empty');

            this._hasInitialImage = false;
            this._imageHopper.enabled = true;

            if (this._isRequired) {
                this._input.required = true;
            }

            var out = this._getOutro();
            if (out) {
                out.style.opacity = '0';
            }

            // get public available clone of data
            var data = this.data;

            // now reset all data
            this._resetData();

            setTimeout(function () {

                if (_this26._isBeingDestroyed) {
                    return;
                }

                _this26._hideButtons(function () {

                    _this26._toggleButton('upload', true);
                });

                _this26._hideStatus();

                _this26._hideResult();

                _this26._options.onRemove(_this26, data);
            }, this.isDetached() ? 0 : 250);

            return data;
        }
    }, {
        key: '_doUpload',
        value: function _doUpload(callback) {
            var _this27 = this;

            // if no input data available, can't upload anything
            if (!this._data.input.image) {
                return;
            }

            this._addState('upload');
            this._startProgress();

            this._hideButtons(function () {

                // block upload button
                _this27._toggleButton('upload', false);

                _this27._save(function (err, res) {

                    _this27._removeState('upload');
                    _this27._stopProgress();

                    if (callback) {
                        callback(err, res);
                    }

                    if (err) {
                        _this27._toggleButton('upload', true);
                    }

                    _this27._showButtons();
                });
            });
        }
    }, {
        key: '_doDownload',
        value: function _doDownload() {

            var image = this._data.output.image;
            if (!image) {
                return;
            }

            var filename = this._data.input.name;
            var mimetype = this._data.input.type;

            image.toBlob(function (blob) {

                var link = create('a');
                link.download = filename;
                link.href = URL.createObjectURL(blob);
                link.click();
            }, mimetype);
        }
    }, {
        key: '_doDestroy',
        value: function _doDestroy() {
            var _this28 = this;

            // set destroy flag to halt any running functionality
            this._isBeingDestroyed = true;

            // this removes the image hopper if it's attached
            if (this._imageHopper) {
                HopperEvents.forEach(function (e) {
                    _this28._imageHopper.element.removeEventListener(e, _this28);
                });
                this._imageHopper.destroy();
            }

            // this block removes the image editor
            if (this._imageEditor) {
                ImageEditorEvents.forEach(function (e) {
                    _this28._imageEditor.element.removeEventListener(e, _this28);
                });
                this._imageEditor.destroy();
            }

            // remove button event listeners
            nodeListToArray(this._btnGroup.children).forEach(function (btn) {
                btn.removeEventListener('click', _this28);
            });

            // stop listening to input
            this._input.removeEventListener('change', this);

            // detect if was wrapped, if so, remove wrapping (needs to have parent node)
            if (this._element !== this._originalElement && this._element.parentNode) {
                this._element.parentNode.replaceChild(this._originalElement, this._element);
            }

            // restore HTML of original element
            this._originalElement.innerHTML = this._originalElementInner;

            // get current attributes and remove all, then add original attributes
            function matchesAttributeInList(a, attributes) {
                return attributes.filter(function (attr) {
                    return a.name === attr.name && a.value === attr.value;
                }).length !== 0;
            }

            var attributes = getElementAttributes(this._originalElement);
            attributes.forEach(function (attribute) {

                // if attribute  is contained in original element attribute list and is the same, don't remove
                if (matchesAttributeInList(attribute, _this28._originalElementAttributes)) {
                    return;
                }

                // else remove
                _this28._originalElement.removeAttribute(attribute.name);
            });

            this._originalElementAttributes.forEach(function (attribute) {

                // attribute was never removed
                if (matchesAttributeInList(attribute, attributes)) {
                    return;
                }

                // add attribute
                _this28._originalElement.setAttribute(attribute.name, attribute.value);
            });

            // now destroyed this counter so the total Slim count can be lowered
            SlimCount = Math.max(0, SlimCount - 1);

            // if slim count has reached 0 it's time to clean up the popover
            if (SlimPopover && SlimCount === 0) {
                SlimPopover.destroy();
                SlimPopover = null;
            }
        }
    }, {
        key: 'data',

        /**
         * Public API
         */

        // properties
        get: function get() {
            return cloneData(this._data);
        }
    }], [{
        key: 'options',
        value: function options() {

            var defaults = {

                // edit button is enabled by default
                edit: true,

                // ratio of crop by default is the same as input image ratio
                ratio: 'free',

                // dimensions to resize the resulting image to
                size: null,

                // initial crop settings for example: {x:0, y:0, width:100, height:100}
                crop: null,

                // post these values
                post: ['output', 'actions'],

                // call this service to submit cropped data
                service: null,

                // when service is set, and this is set to true, Soon will auto upload all crops (also auto crops)
                push: false,

                // default fallback name for field
                defaultInputName: 'slim[]',

                // minimum size of cropped area object with width and height property
                minSize: {
                    width: 100,
                    height: 100
                },

                // maximum file size in MB to upload
                maxFileSize: null,

                // render download link
                download: false,

                // label HTML to show inside drop area
                label: '<p>Drop your image here</p>',

                // error messages
                statusFileType: '<p>Invalid file type, expects: $0.</p>',
                statusFileSize: '<p>File is too big, maximum file size: $0 MB.</p>',
                statusNoSupport: '<p>Your browser does not support image cropping.</p>',
                statusContentLength: '<span class="slim-upload-status-icon"></span> The file is probably too big',
                statusUnknownResponse: '<span class="slim-upload-status-icon"></span> An unknown error occurred',
                statusUploadSuccess: '<span class="slim-upload-status-icon"></span> Saved',

                // callback methods
                onInit: function onInit(slim) {},
                onTransform: function onTransform(data, cb) {
                    cb(data);
                },
                onSave: function onSave(data, cb) {
                    cb(data);
                },
                onComplete: function onComplete(err, res) {},
                onBeforeRemove: function onBeforeRemove(slim, cb) {
                    cb();
                },
                onRemove: function onRemove(slim, data) {}

            };

            // add default button labels
            SlimButtons.concat(ImageEditorButtons).forEach(function (btn) {
                var capitalized = capitalizeFirstLetter(btn);
                defaults['button' + capitalized + 'ClassName'] = null;
                defaults['button' + capitalized + 'Label'] = capitalized;
                defaults['button' + capitalized + 'Title'] = null;
            });

            return defaults;
        }
    }]);

    return Slim;
})();

(function () {

    var instances = [];

    var indexOfElement = function indexOfElement(element) {
        var i = 0;
        var l = instances.length;
        for (; i < l; i++) {
            if (instances[i].isAttachedTo(element)) {
                return i;
            }
        }
        return -1;
    };

    function getData(el, attribute) {
        return el.getAttribute('data-' + attribute);
    }

    function toAttribute(property) {
        return property.replace(/([a-z](?=[A-Z]))/g, '$1-').toLowerCase();
    }

    function clone(value) {
        if (typeof value === 'object') {
            return JSON.parse(JSON.stringify(value));
        }
        return value;
    }

    function toLabel(v) {
        // if value set, use as label
        if (v) {
            return '<p>' + v + '</p>';
        }

        // else use default text
        return null;
    }

    function toFunctionReference(name) {
        var ref = window;
        var levels = name.split('.');
        levels.forEach(function (level, index) {
            ref = ref[levels[index]];
        });
        return ref;
    }

    var passThrough = function passThrough(e, v) {
        return v;
    };
    var defaultFalse = function defaultFalse(e, v) {
        return v === 'true';
    };
    var defaultTrue = function defaultTrue(e, v) {
        return v ? v === 'true' : true;
    };
    var defaultLabel = function defaultLabel(e, v) {
        return toLabel(v);
    };
    var defaultFunction = function defaultFunction(e, v) {
        return v ? toFunctionReference(v) : null;
    };
    var defaultSize = function defaultSize(e, v) {
        if (!v) {
            return null;
        }
        var parts = intSplit(v, ',');
        return { width: parts[0], height: parts[1] };
    };

    var toRect = function toRect(e, v) {
        if (!v) {
            return null;
        }
        var obj = {};
        v.split(',').map(function (p) {
            return parseInt(p, 10);
        }).forEach(function (v, i) {
            obj[Rect[i]] = v;
        });
        return obj;
    };

    var defaults = {

        // is user allowed to download the cropped image?
        'download': defaultFalse,

        // is user allowed to edit the cropped image?
        'edit': defaultTrue,

        // minimum crop size in pixels of original image
        'minSize': defaultSize,

        // the final size of the output image
        'size': defaultSize,

        // url to post to
        'service': function service(e, v) {
            return typeof v === 'undefined' ? null : v;
        },

        // set auto push mode
        'push': defaultFalse,

        // set crop rect
        'crop': toRect,

        // what to post
        'post': function post(e, v) {
            if (!v) {
                return null;
            }
            return v.split(',').map(function (item) {
                return item.trim();
            });
        },

        // default input name
        'defaultInputName': passThrough,

        // the ratio of the crop
        'ratio': function ratio(e, v) {
            if (!v) {
                return null;
            }
            return v;
        },

        // maximum file size
        'maxFileSize': function maxFileSize(e, v) {
            if (!v) {
                return null;
            }
            return parseFloat(v);
        },

        // default labels
        'label': defaultLabel

    };

    // labels
    ['FileSize', 'FileType', 'NoSupport'].forEach(function (status) {
        defaults['status' + status] = defaultLabel;
    });

    // status
    ['ContentLength', 'UnknownResponse', 'UploadSuccess'].forEach(function (status) {
        defaults['status' + status] = passThrough;
    });

    // the events to bind to
    ['Init', 'Transform', 'Save', 'Complete', 'BeforeRemove', 'Remove'].forEach(function (cb) {
        defaults['on' + cb] = defaultFunction;
    });

    // button defaults
    var buttonOptions = ['ClassName', 'Label', 'Title'];
    SlimButtons.concat(ImageEditorButtons).forEach(function (btn) {
        var capitalized = capitalizeFirstLetter(btn);
        buttonOptions.forEach(function (opt) {
            defaults['button' + capitalized + opt] = passThrough;
        });
    });

    Slim.supported = (function () {

        return typeof window.FileReader !== 'undefined';
    })();

    Slim.parse = function (context) {

        var elements;
        var element;
        var i;
        var options;
        var value;
        var prop;
        var croppers = [];

        // find all crop elements and bind Crop behavior
        elements = context.querySelectorAll('.slim:not([data-state])');
        i = elements.length;

        while (i--) {

            element = elements[i];
            options = {};

            for (prop in defaults) {
                if (!defaults.hasOwnProperty(prop)) {
                    continue;
                }
                value = defaults[prop](element, getData(element, toAttribute(prop)));
                options[prop] = value === null ? clone(Slim.options()[prop]) : value;
            }

            croppers.push(Slim.create(element, options));
        }

        return croppers;
    };

    Slim.find = function (element) {
        var result = instances.filter(function (instance) {
            return instance.isAttachedTo(element);
        });
        return result ? result[0] : null;
    };

    Slim.create = function (element, options) {

        // if already in array, can't create another slim
        if (Slim.find(element)) {
            return;
        }

        // instance
        var slim = new Slim(element, options);

        // add new slim
        instances.push(slim);

        // return the slim instance
        return slim;
    };

    Slim.destroy = function (element) {

        var index = indexOfElement(element);

        if (index < 0) {
            return false;
        }

        instances[index].destroy();
        instances[index] = null;
        instances.splice(index, 1);
        return true;
    };
})();
    return Slim;
}();

    // constants
    var scope = 'slim';

    // helper methods
    function argsToArray(args) {
        return Array.prototype.slice.call(args);
    }
    
    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    function addTojQuery(endpoint) {
        $.fn[scope + (endpoint === 'create' ? '' : capitalizeFirstLetter(endpoint))] = function() {
            var args = argsToArray(arguments);
            return this.each(function(){
                Slim[endpoint].apply(Slim[endpoint],[this].concat(args));
            })
        }
    }

    // transfer endpoints
    for (var endpoint in Slim) {
        if (!Slim.hasOwnProperty(endpoint)) {continue;}
        addTojQuery(endpoint);
    }

}(window.jQuery));