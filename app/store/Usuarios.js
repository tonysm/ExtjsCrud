Ext.define('CrudTest.store.Usuarios', {
	extend: 'Ext.data.Store',
	model: 'CrudTest.model.Usuario',
	autoLoad: true,
	proxy: {
		type: 'ajax',
		api: {
			read: 'data/usuarios.json',
			update: 'data/updateUsuarios.json',
			create: 'data/addUsuarios.json',
			destroy: 'data/deleteUsuarios.json'
		},
		reader: {
			type: 'json',
			root: 'usuarios',
			successProperty: 'success'
		}
	}
});