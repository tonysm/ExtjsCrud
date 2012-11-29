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
			},
			'usuarioslist button[action=add]': {
				click: this.newUsuario
			},
			'usuarioslist button[action=delete]': {
				click: this.deleteUsuarios
			}
		});

		this.getUsuariosStore().on('write', this.afterWrite);
	},
	afterWrite: function(store, opt, eOpts) {
		store.load(opt.records);
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
		
		if(record.get('id') == undefined) {
			this.getUsuariosStore().add(record);
		}
		this.getUsuariosStore().sync();
	},
	newUsuario: function( btn ) {
		var view = Ext.widget('usuariosedit');
		view.setTitle("Novo usuário");

		view.down('form').loadRecord( Ext.create('CrudTest.model.Usuario') );
	},
	deleteUsuarios: function( btn ) {
		var grid = btn.up('grid'),
			selection = grid.getSelectionModel().getSelection(),
			store = grid.getStore();

		// se nenhum item estiver selecionado
		if(selection.length == 0) {
			Ext.MessageBox.alert('Atenção', 'Selecione algum item para excluir.');
			return;
		}

		// confirmar antes de deletar
		Ext.MessageBox.confirm('Atenção', 'Tem certeza que deseja excluir os itens selecionados?', function( opt ) {
			if(opt == 'yes') {
				for(var i in selection) {
					store.remove(selection[i]);
				}
			}

			store.sync();
		});
	}
});