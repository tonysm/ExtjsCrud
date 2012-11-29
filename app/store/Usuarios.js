Ext.define('CrudTest.store.Usuarios', {
	extend: 'Ext.data.Store',
	model: 'CrudTest.model.Usuario',
	autoLoad: true,
	proxy: {
		type: 'ajax',
		api: {
			read: 'php/index.php?control=usuarios&action=listAll',
			update: 'data/updateUsuarios.json',
			create: 'php/index.php?control=usuarios&action=save',
			destroy: 'data/deleteUsuarios.json'
		},
		actionMethods: {
			create: 'POST',
			read: 'POST',
			update: 'POST',
			destroy: 'POST'
		},
		reader: {
			type: 'json',
			root: 'data',
			successProperty: 'success'
		},
		writer: {
			type: 'json',
			writeAllFields: true,
			root: 'data',
			encode: true
		}
	}
});