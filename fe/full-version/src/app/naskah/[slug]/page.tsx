import {
    Card,
    CardContent,
    Typography,
    Grid,
    Divider,
    Chip,
    Box,
    Button,
    CardHeader
} from '@mui/material'

// Third-party Imports
import classnames from 'classnames'
// Styles Imports
import frontCommonStyles from './styles.module.css'
// Style Imports
import styles from '@core/styles/table.module.css'
import { Noto_Sans_Kharoshthi } from 'next/font/google'

export default async function Page({ params }) {

    const url = `${process.env.API_URL}/api/public/naskah/${params.slug}`
    console.log("hit : " + url)
    const res = await fetch(url,
        {
            cache: 'no-store'
        }
    )

    const naskah = await res.json()
    console.log("data dari api laravel ");
    console.log(naskah)

    return (
        <section className={classnames('md:plb-[100px] plb-6', frontCommonStyles.layoutSpacing)}>
            <Card>
                <CardHeader title={naskah?.title} />
                <div className='overflow-x-auto'>
                    <table className={styles.table}>
                        <thead>
                            <tr>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Lembaga Penyimpan</td>
                                <td>{naskah.lembaga_penyimpanan}</td>
                            </tr>
                            <tr>
                                <td>Negara</td>
                                <td>{naskah.negara}</td>
                            </tr>
                            <tr>
                                <td>Kode Inventaris</td>
                                <td>{naskah.kode_inventaris}</td>
                            </tr>
                            <tr>
                                <td>Riwayat Naskah</td>
                                <td>{naskah.riwayat_naskah}</td>
                            </tr>
                            <tr>
                                <td>Aksara</td>
                                <td>{naskah.aksara}</td>
                            </tr>
                            <tr>
                                <td>Bahasa</td>
                                <td>{naskah.bahasa}</td>
                            </tr>
                            <tr>
                                <td>Alas Tulis</td>
                                <td>{naskah.alat_tulis}</td>
                            </tr>
                            <tr>
                                <td>Deskripsi Fisik</td>
                                <td>{naskah?.deskripsi_fisik}</td>
                            </tr>
                            <tr>
                                <td>Deskripsi Isi</td>
                                <td>{naskah?.description}</td>
                            </tr>
                            <tr>
                                <td>Referensi Katalog</td>
                                <td>{naskah.referensi_katalog}</td>
                            </tr>
                            <tr>
                                <td>Akses Digital</td>
                                <td>{naskah.akses_digital}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </Card>
        </section>
    )
}