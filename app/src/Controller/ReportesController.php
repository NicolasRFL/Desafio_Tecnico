<?php
declare(strict_types=1);

namespace App\Controller;

class ReportesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->Muestras = $this->fetchTable('Muestras');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Muestras->find()
            ->contain(['Resultados']);
            
        $especie = $this->request->getQuery('especie');
        $fechaDesde = $this->request->getQuery('desde');
        $fechaHasta = $this->request->getQuery('hasta');

        if (!empty($especie)) {
            $query->where(['Muestras.especie LIKE' => "%$especie%"]);
        }

        if (!empty($fechaDesde) && !empty($fechaHasta)) {
            $query->where(function ($exp, $q) use ($fechaDesde, $fechaHasta) {
                return $exp->between('Muestras.created', $fechaDesde, $fechaHasta);
            });
        }

        $muestras = $query->all();

        $this->set(compact('muestras'));
    }
}