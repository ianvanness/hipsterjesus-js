(function( $ ) {
    var _fields = {
        'paras': {
            'name': 'paras',
            'def': 4,
            'range' : {
                'low': 1,
                'high': 99
            }
        },
        'type': {
            'name' : 'type',
            'def': 'hipster-latin',
            'values': ['hipster-latin','hipster-centric']
        },
        'html': {
            'name': 'html',
            'def': 'true',
            'values': ['true','false']
        }
    };
    
    var methods = {
        //init : function( opts ) { // <!-- eventually
        init : function() {
            // unused, but should take advantage of this, and add others
            /*
            var _settings = $.extend( {
                'form' : $('#params_form')
            }, opts );
            */
            
            for( var p in _fields ) {
                $( _fields[p].name ).bind('change', methods.validate );
            }
        },
        validate : function( el ) {
            _validator = _fields[el.target.id];
            switch( el.target.id ) {
                case 'paras':
                    if( $('#' + el.target.id).val() >= _validator.range.low && $('#' + el.target.id).val() <= _validator.range.high ) {
                        // okay
                    } else {
                        $('#' + el.target.id).val( _validator.def );
                    }
                break;
                case 'html': // same type
                case 'type':
                    if( $.inArray( $('#' + el.target.id).val(), _validator.values ) >= 0 ) {
                        // okay
                    } else {
                        $('#' + el.target.id).val( _validator.def );
                    }
                break;
            }
            methods.updatecodeblock();
        },
        updatecodeblock: function() {
            $('.codeblock').text( $('.codeblock').text().replace(/\/api\/.*'/, '/api/' + methods.calculateQs() + "'" ) );
        },
        calculateQs: function() {
            // get vals for each of the fields
            qs = '';
            qsparts = [];
            for( var p in _fields ) {
                if( $('#' + _fields[p].name).val() != _fields[p].def ) {
                    qp =  
                        _fields[p].name + 
                        '=' + 
                        $('#' + _fields[p].name).val();

                    qsparts.push( qp );
                }
            }
            if( qsparts.length > 0 ) {
                qs = '?';
            }
            qs = qs + qsparts.join("&");
            return qs;
        }
        
    };
    
    $.fn.params = function( method ) {
        // Method calling logic
        if( methods[method] ) {
            return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if ( typeof method === 'object' || ! method ) {
            return methods.init.apply( this, arguments );
        } else {
            $.error( 'Method ' +  method + ' does not exist on jQuery.params' );
        }
    };
})( jQuery );