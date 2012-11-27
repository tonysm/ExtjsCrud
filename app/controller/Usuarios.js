Ext.define('CrudTest.controller.Usuarios', {
	extend: 'Ext.app.Controller',
	views: [
		'usuarios.List',
		'usuarios.Edit'
	],
	stores: [
		'Usuarios'
	],
	models: [
		'Usuario'
	],
	init: function() {
		this.control({
			'viewport > usuarioslist': {
				itemdblclick: this.editUsuario
			},
			'usuariosedit button[action=save]': {
				click: this.updateUsuario
			}
		});
	},
	editUsuario: function(grid, record) {
		var view = Ext.widget('usuariosedit');
		// passando o usuário selecionado para o formulário
		view.down('form').loadRecord(record);
	},

	updateUsuario: function( button ) {
		var win = button.up('window'),
			form = win.down('form'),
			record = form.getRecord(),
			values = form.getValues();

		record.set(values);

		win.close();
		this.getUsuariosStore().sync();
	}
});