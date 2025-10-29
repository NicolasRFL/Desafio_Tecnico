<?php
declare(strict_types=1);

namespace App\Controller;

use DateTime;

class ReportesController extends AppController
{
    private $Muestras = null;
    public function initialize(): void
    {
        parent::initialize();
        $this->Muestras =  $this->getTableLocator()->get('Muestras');
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

        $desdeDt = null;
        $hastaDt = null;

        if (!empty($fechaDesde)) {
            try {
                $desdeDt = new DateTime($fechaDesde);
                $desdeDt->setTime(0, 0, 0);
            } catch (\Exception $e) {
                $this->Flash->error('Fecha "Desde" inválida.');
                $desdeDt = null;
            }
        }

        if (!empty($fechaHasta)) {
            try {
                $hastaDt = new DateTime($fechaHasta);
                $hastaDt->setTime(23, 59, 59);
            } catch (\Exception $e) {
                $this->Flash->error('Fecha "Hasta" inválida.');
                $hastaDt = null;
            }
        }

        if ($desdeDt && $hastaDt) {
            $query->matching('Resultados', function ($q) use ($desdeDt, $hastaDt) {
            return $q->where([
            'Resultados.fecha_creacion >=' => $desdeDt->format('Y-m-d H:i:s'),
            'Resultados.fecha_creacion <=' => $hastaDt->format('Y-m-d H:i:s'),
            ]);
            });
        } elseif ($desdeDt) {
            $query->matching('Resultados', function ($q) use ($desdeDt) {
            return $q->where(['Resultados.fecha_creacion >=' => $desdeDt->format('Y-m-d H:i:s')]);
            });
        } elseif ($hastaDt) {
            $query->matching('Resultados', function ($q) use ($hastaDt) {
            return $q->where(['Resultados.fecha_creacion <=' => $hastaDt->format('Y-m-d H:i:s')]);
            });
        }
            
        $muestras = $query->all()->toArray(); 
        $this->set(compact('muestras'));
    }
}